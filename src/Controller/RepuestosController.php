<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Repuestos Controller
 *
 * @property \App\Model\Table\RepuestosTable $Repuestos
 * @method \App\Model\Entity\Repuesto[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RepuestosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $key = $this->request->getQuery('key');        
        if($key){
            if (is_numeric($key)) {
                $query = $this->Repuestos->findById($key);
            }else{
                $query = $this->Repuestos->findByNombreOrDescripcion($key,$key);
            }            
        }else{
            $query = $this->Repuestos;            
        }
        $repuestos = $this->paginate($query);    
        $this->set(compact('repuestos'));
    }

    public function reporte(){
        $key2 = $this->request->getQuery('key2');
        $key3 = $this->request->getQuery('key3');
        $key4 = $this->request->getQuery('key4');
        if($key2 && $key3 && $key4){            
            $conditions = array(
                'conditions' => array(
                'and' => array(
                                array('Repuestos.created >= ' => $key2,
                                    'Repuestos.created <= ' => $key3
                                    ),
                    'Repuestos.cantidad <' => "$key4"                    
                    )));
            $query = $this->Repuestos->find('all', $conditions);
        }else{
            $query = $this->Repuestos;
        }
        $repuestos = $this->paginate($query);
        $this->set(compact('repuestos'));
    }

    /**
     * View method
     *
     * @param string|null $id Repuesto id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $repuesto = $this->Repuestos->get($id, [
            'contain' => [],
        ]);        
        $this->set(compact('repuesto'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $repuesto = $this->Repuestos->newEmptyEntity();
        if ($this->request->is('post')) {
            $repuesto = $this->Repuestos->patchEntity($repuesto, $this->request->getData());
            if ($this->Repuestos->save($repuesto)) {
                $this->Flash->success(__('Repuesto registrado con éxito.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Ha ocurrido un error. Intente nuevamente.'));
        }
        $this->set(compact('repuesto'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Repuesto id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $repuesto = $this->Repuestos->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $repuesto = $this->Repuestos->patchEntity($repuesto, $this->request->getData());
            if ($this->Repuestos->save($repuesto)) {
                $this->Flash->success(__('Repuesto editado con éxito.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Ha ocurrido un error. Intente nuevamente.'));
        }
        $this->set(compact('repuesto'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Repuesto id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $repuesto = $this->Repuestos->get($id);
        if ($this->Repuestos->delete($repuesto)) {
            $this->Flash->success(__('Repuesto eliminado con éxito.'));
        } else {
            $this->Flash->error(__('Ha ocurrido un error. Intente nuevamente'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function agregarfactura(){
        $orden = $this->getRequest()->getSession()->read('carrito');        
        $cantidad = $this->getRequest()->getData('cantidad');    
        
        if ($this->getRequest()->getSession()->check('carrito.' . $this->getRequest()->getData('repuesto_id'))) {
            $cantidad += $this->getRequest()->getSession()->read('carrito.' . $this->getRequest()->getData('repuesto_id'));
        }        
        $orden[$this->getRequest()->getData('repuesto_id')] = $cantidad;
        
        $this->getRequest()->getSession()->write('carrito', $orden);
        $this->Flash->success(__('Repuesto agregado a la orden con éxito.'));
        return $this->redirect(['action' => 'index']);                     
    }

    public function borrarfactura($repuestoId)
    {        
        $this->getRequest()->getSession()->delete('carrito.' . $repuestoId);

        return $this->redirect(['controller' => 'Orders', 'action' => 'checkout']);
    }    
}
