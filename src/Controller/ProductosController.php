<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Productos Controller
 *
 * @property \App\Model\Table\ProductosTable $Productos
 * @method \App\Model\Entity\Producto[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProductosController extends AppController
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
                $query = $this->Productos->findById($key);
            }else{
                $query = $this->Productos->findByNombreOrModeloOrMarcaOrNum_serieOrFallaOrEstado($key,$key,$key,$key,$key,$key);  
            }                    
        }else{
            $query = $this->Productos;
        }
        $this->paginate = [
            'contain' => ['Users'],
        ];
        $productos = $this->paginate($query);

        $this->set(compact('productos'));
    }

    public function misproductos($user_id)
    {
        $this->paginate = [
            'contain' => ['Users'],
        ];
        $productos = $this->paginate($this->Productos->find() ->where(['user_id =' => $user_id]));
        $this->set(compact('productos'));
    }


    /**
     * View method
     *
     * @param string|null $id Producto id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $producto = $this->Productos->get($id, [
            'contain' => ['Users','Orders'],
        ]);

        $this->set(compact('producto'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $producto = $this->Productos->newEmptyEntity();
        if ($this->request->is('post')) {
            $producto = $this->Productos->patchEntity($producto, $this->request->getData());
            $producto->estado = 'ingresado';
            $producto->user_id = $this->Auth->user('id');
            if ($this->Productos->save($producto)) {
                $this->Flash->success(__('El producto ha sido agregado con éxito'));

                return $this->redirect(['controller' => 'Productos', 'action' => 'misproductos', $producto->user_id]);
            }
            $this->Flash->error(__('El producto no se puede agregar. Intente nuevamente'));
        }
        $users = $this->Productos->Users->find('list', ['limit' => 200])->all();
        $this->set(compact('producto', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Producto id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $producto = $this->Productos->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $producto = $this->Productos->patchEntity($producto, $this->request->getData());
            if ($this->Productos->save($producto)) {
                $this->Flash->success(__('Producto editado con éxito'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('El producto no se puede editar. Intente nuevamente.'));
        }
        $users = $this->Productos->Users->find('list', ['limit' => 200])->all();
        $this->set(compact('producto', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Producto id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $producto = $this->Productos->get($id);
        if ($this->Productos->delete($producto)) {
            $this->Flash->success(__('Producto eliminado con éxito.'));
        } else {
            $this->Flash->error(__('El producto no se puede eliminar. Intente nuevamente.'));
        }
        return $this->redirect(['controller' => 'Productos', 'action' => 'misproductos', $producto->user_id]);
    }
}
