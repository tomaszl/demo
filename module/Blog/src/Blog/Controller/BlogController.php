<?php
namespace Blog\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Blog\Model\Blog;          // <-- Add this import
use Blog\Form\PostForm;       // <-- Add this import

class BlogController extends AbstractActionController
{
    protected $postTable;

   public function indexAction()
    {
        return new ViewModel(array(
            'post' => $this->getPostTable()->fetchAll(),
        ));
    }

   public function addAction()
    {
        $form = new AlbumForm();
        $form->get('submit')->setValue('Add');

        $request = $this->getRequest();
        if ($request->isPost()) {
            $album = new Post();
            $form->setInputFilter($album->getInputFilter());
            $form->setData($request->getPost());

            if ($form->isValid()) {
                $album->exchangeArray($form->getData());
                $this->getPostTable()->savePost($post);

                // Redirect to list of albums
                return $this->redirect()->toRoute('post');
            }
        }
        return array('form' => $form);
    }


    public function editAction()
    {
    }

    public function deleteAction()
    {
    }
    public function getPostTable()
    {
        if (!$this->postTable) {
            $sm = $this->getServiceLocator();
            $this->postTable = $sm->get('Blog\Model\PostTable');
        }
        return $this->postTable;
    }
}
