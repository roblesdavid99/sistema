<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\ORM\Locator\LocatorAwareTrait;

/**
 * Orders Controller
 *
 * @property \App\Model\Table\OrdersTable $Orders
 * @method \App\Model\Entity\Order[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class OrdersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */

    public function checkout()
    {        
        $this->loadModel('Repuestos');
        $listaRepuestos = [];
        if (!empty($this->getRequest()->getSession()->read('carrito'))) {
            foreach ($this->getRequest()->getSession()->read('carrito') as $idRepuesto => $cantidad) {
                $listaRepuestos[] = [
                    'repuesto' => $this->Repuestos->get($idRepuesto),
                    'cantidad' => $cantidad
                ];
            }
        }

        $order = $this->Orders->newEmptyEntity();               
        
        if ($this->getRequest()->is('post')) {
            $datas = $this->getRequest()->getData();            
            $datas['order_lista'] = [];
            foreach ($this->getRequest()->getSession()->read('carrito') as $idRepuesto => $cantidad) {
                $datas['order_lista'][] = [
                    'repuesto_id' => $idRepuesto,
                    'cantidad' => $cantidad
                ];
                $repuestosTable = $this->getTableLocator()->get('Repuestos');
                $repuesto = $repuestosTable->get($idRepuesto);
                $repuesto->cantidad = $repuesto->cantidad - $cantidad;
                $repuestosTable->save($repuesto);                                                     
            }            
            $order = $this->Orders->patchEntity(
                $order,
                $datas,
                ['associated' => ['OrdersLista']]
            );                                
            
            if ($this->Orders->save($order)) {                   
                foreach ($this->getRequest()->getSession()->read('carrito') as $idRepuesto => $cantidad) {
                    $ordersListaTable = $this->getTableLocator()->get('OrdersLista');
                    $orderList = $ordersListaTable->newEmptyEntity();
                    $orderList->repuesto_id = $idRepuesto;
                    $orderList->cantidad = $cantidad;
                    $orderList->order_id = $order->id;

                    $repuestosTable1 = $this->getTableLocator()->get('Repuestos');
                    $repuestoDato = $repuestosTable1->get($idRepuesto);
                    $orderList->nombre = $repuestoDato->nombre;
                    $orderList->precio = $repuestoDato->precio;

                    $ordersListaTable->save($orderList);
                }
                $order = $this->Orders->get($order->id, ['contain' => ['OrdersLista.Repuestos']]);                

                $this->getRequest()->getSession()->delete('carrito');
                return $this->redirect(['action' => 'index']);                  
            }
        }        
        $productosTable = $this->getTableLocator()->get('Productos');
        $query = $productosTable->find('list');              
        $productos = $query->toArray();

        $this->set(compact('order', 'listaRepuestos', 'productos'));
    }

    public function index()
    {
        $orders = $this->paginate($this->Orders);

        $this->set(compact('orders'));
    }

    /**
     * View method
     *
     * @param string|null $id Order id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $order = $this->Orders->get($id, [
            'contain' => ['OrdersLista'],
        ]);

        $this->set(compact('order'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $order = $this->Orders->newEmptyEntity();
        if ($this->request->is('post')) {
            $order = $this->Orders->patchEntity($order, $this->request->getData());
            if ($this->Orders->save($order)) {
                $this->Flash->success(__('The order has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The order could not be saved. Please, try again.'));
        }
        $this->set(compact('order'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Order id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $order = $this->Orders->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $order = $this->Orders->patchEntity($order, $this->request->getData());
            if ($this->Orders->save($order)) {
                $this->Flash->success(__('The order has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The order could not be saved. Please, try again.'));
        }
        $this->set(compact('order'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Order id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $order = $this->Orders->get($id);
        if ($this->Orders->delete($order)) {
            $this->Flash->success(__('The order has been deleted.'));
        } else {
            $this->Flash->error(__('The order could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
