<?php
App::uses('AppController', 'Controller');
App::uses('Folder', 'Utility'); // utilize Folder API
App::uses('File', 'Utility');

/**
 * Documents Controller
 *
 * @property Document $Document
 * @property PaginatorComponent $Paginator
 */
class DocumentsController extends AppController {

/**
 * Components
 *
 * @var array
 */

public $components = array('Paginator','Auth');


public function isAuthorized($user = NULL) {

		// Unless they are an admin, only the owner of a post can edit or delete it
	if (in_array($this->action, array('admin_edit', 'admin_delete')) && ($this->Auth->user('role') != 'admin')) {

		$postId = (int) $this->request->params['pass'][0];
		if($this->Post->isOwnedBy($postId,$this->Auth->user('id'))){
			return true;
		}
	}


	return parent::isAuthorized($user);
}


public function admin_download($id,$filename)
{
	$path = WWW_ROOT .'uploads'.DS.$this->Auth->user('id'). DS . $id . DS. $filename;
	$this->autoRender = false;
	$this->response->file($path);
	return $this->response;
}

/**
 * index method
 *
 * @return void
 */

public function index() {
	$this->Document->recursive = 0;
	$this->set('documents', $this->Paginator->paginate());
}


public function admin_index() {
	$this->Document->recursive = 0;
	$this->set('documents', $this->Paginator->paginate());
}
/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
public function view($id = null) {
	if (!$this->Document->exists($id)) {
		throw new NotFoundException(__('Invalid document'));
	}
	$options = array('conditions' => array('Document.' . $this->Document->primaryKey => $id));
	$this->set('document', $this->Document->find('first', $options));
}

public function admin_view($id = null) {
	if (!$this->Document->exists($id)) {
		throw new NotFoundException(__('Invalid document'));
	}
	$options = array('conditions' => array('Document.' . $this->Document->primaryKey => $id));
	$this->set('document', $this->Document->find('first', $options));
}

/**
 * add method
 *
 * @return void
 */
public function add() {
	if (AuthComponent::user()){
		if ($this->request->is('post') || $this->request->is('put')) {
			$this->Document->create();
			$this->Document->validator()->remove('Topic');
			$this->request->data['Document']['filename'] = $this->data['Document']['submittedfile']['name'];
			$this->request->data['Document']['type'] = $this->data['Document']['submittedfile']['type'];
			$this->request->data['Document']['size'] = $this->data['Document']['submittedfile']['size'];
			if ($this->Document->save($this->request->data)) {
				//Upload proceeding
				$folder = new Folder();
				if ($folder->create(WWW_ROOT. DS . 'uploads'.DS. $this->Auth->user('id'). DS. $this->Document->id))
				{
					$filepath = WWW_ROOT. DS . 'uploads'.DS.$this->Auth->user('id'). DS. $this->Document->id .DS .$this->data['Document']['submittedfile']['name'];
					move_uploaded_file($this->data['Document']['submittedfile']['tmp_name'],$filepath);
				}
				//Converting to pdf in case of Doc file
				if ( $this->data['Document']['submittedfile']['type'] != 'application/pdf') {
					$output_dir = 'C:/wamp/www/hustdoc.vn/app/webroot/uploads/'. $this->Auth->user('id'). '/' .$this->Document->id;
					$doc_file = 'C:/wamp/www/hustdoc.vn/app\webroot/uploads/'. $this->Auth->user('id').'/'.$this->Document->id.'/'.$this->data['Document']['submittedfile']['name'];
					$pdf_file = $this->data['Document']['submittedfile']['name'].'.pdf';
					$output_file = $output_dir.'/'. $pdf_file;
					$doc_file = "file:///" . $doc_file;
					$output_file = "file:///" . $output_file;
					$this->word2pdf($doc_file,$output_file);
				}
				$this->Session->setFlash(__('The document has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The document could not be saved. Please, try again.'));
			}
		}
		$users = $this->Document->User->find('list');
		$topics = $this->Document->Topic->find('list');
		$this->set(compact('users', 'topics'));
	} else{
		$this->Session->setFlash(__('You do not have permission to do this'));
		return $this->redirect('http://localhost/hustdoc.vn/login');
	}
}

public function admin_add() {
	if ($this->request->is('post')) {
		$this->Document->create();
		$this->Document->validator()->remove('Topic');
		$this->request->data['Document']['filename'] = $this->data['Document']['submittedfile']['name'];
		$this->request->data['Document']['type'] = $this->data['Document']['submittedfile']['type'];
		$this->request->data['Document']['size'] = $this->data['Document']['submittedfile']['size'];
		if ($this->Document->save($this->request->data)) {
			//Upload proceeding
			$folder = new Folder();
			if ($folder->create(WWW_ROOT. DS . 'uploads'.DS. $this->Auth->user('id'). DS. $this->Document->id))
			{
				$filepath = WWW_ROOT. DS . 'uploads'.DS.$this->Auth->user('id'). DS. $this->Document->id .DS .$this->data['Document']['submittedfile']['name'];
				move_uploaded_file($this->data['Document']['submittedfile']['tmp_name'],$filepath);
			}
			//Converting to pdf in case of Doc file
			if ( $this->data['Document']['submittedfile']['type'] != 'application/pdf') {
				$output_dir = 'C:/wamp/www/hustdoc.vn/app/webroot/uploads/'. $this->Auth->user('id'). '/' .$this->Document->id;
				$doc_file = 'C:/wamp/www/hustdoc.vn/app\webroot/uploads/'. $this->Auth->user('id').'/'.$this->Document->id.'/'.$this->data['Document']['submittedfile']['name'];
				$pdf_file = $this->data['Document']['submittedfile']['name'].'.pdf';
				$output_file = $output_dir.'/'. $pdf_file;
				$doc_file = "file:///" . $doc_file;
				$output_file = "file:///" . $output_file;
				$this->word2pdf($doc_file,$output_file);
			}
			$this->Session->setFlash(__('The document has been saved.'));
			return $this->redirect(array('action' => 'index'));
		} else {
			$this->Session->setFlash(__('The document could not be saved. Please, try again.'));
		}
	}
	$users = $this->Document->User->find('list');
	$topics = $this->Document->Topic->find('list');
	$this->set(compact('users', 'topics'));

}



/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
public function edit($id = null) {
	if (!$this->Document->exists($id)) {
		throw new NotFoundException(__('Invalid document'));
	}
	if ($this->request->is(array('post', 'put'))) {
		if ($this->Document->save($this->request->data)) {
			$this->Session->setFlash(__('The document has been saved.'));
			return $this->redirect(array('action' => 'index'));
		} else {
			$this->Session->setFlash(__('The document could not be saved. Please, try again.'));
		}
	} else {
		$options = array('conditions' => array('Document.' . $this->Document->primaryKey => $id));
		$this->request->data = $this->Document->find('first', $options);
	}
	$users = $this->Document->User->find('list');
	$topics = $this->Document->Topic->find('list');
	$this->set(compact('users', 'topics'));
}


public function admin_edit($id = null) {
	if (!$this->Document->exists($id)) {
		throw new NotFoundException(__('Invalid document'));
	}
	if ($this->request->is(array('post', 'put'))) {
		if ($this->Document->save($this->request->data)) {
			$this->Session->setFlash(__('The document has been saved.'));
			return $this->redirect(array('action' => 'index'));
		} else {
			$this->Session->setFlash(__('The document could not be saved. Please, try again.'));
		}
	} else {
		$options = array('conditions' => array('Document.' . $this->Document->primaryKey => $id));
		$this->request->data = $this->Document->find('first', $options);
	}
	$users = $this->Document->User->find('list');
	$topics = $this->Document->Topic->find('list');
	$this->set(compact('users', 'topics'));
}
/**
 * admin delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
public function admin_delete($id = null) {
	$this->Document->id = $id;
	if (!$this->Document->exists()) {
		throw new NotFoundException(__('Invalid document'));
	}
	$this->request->allowMethod('post', 'delete');
		//Delete stored file
	$document = $this->Document->find('first', array('conditions' => array('Document.id' => $id)));
	$folder = new Folder(WWW_ROOT. DS . 'uploads'.DS.$document['Document']['user_id']. DS. $document['Document']['id']);
	$folder->delete();
		//Deleted
	if ($this->Document->delete()) {
		$this->Session->setFlash(__('The document has been deleted.'));
		print_r($path);
	} else {
		$this->Session->setFlash(__('The document could not be deleted. Please, try again.'));
	}
	return $this->redirect(array('action' => 'index'));
}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
public function delete($id = null) {
	$this->Document->id = $id;

	if (!$this->Document->exists()) {
		throw new NotFoundException(__('Invalid document'));
	}
	$this->request->allowMethod('post', 'delete');
		//Delete stored file
	$document = $this->Document->find('first', array('conditions' => array('Document.id' => $id)));
	$folder = new Folder(WWW_ROOT. DS . 'uploads'.DS.$document['Document']['user_id']. DS. $document['Document']['id']);	
	$folder->delete();
		//Deleted
	if ($this->Document->delete()) {
		$this->Session->setFlash(__('The document has been deleted.'));
	} else {
		$this->Session->setFlash(__('The document could not be deleted. Please, try again.'));
	}
	return $this->redirect(array('action' => 'index'));
}


function sanitize($string, $force_lowercase = true, $anal = false) {
	$strip = array("~", "`", "!", "@", "#", "$", "%", "^", "&", "*", "(", ")", "_", "=", "+", "[", "{", "]","}", "\\", "|", ";", ":", "\"", "'", "&#8216;", "&#8217;", "&#8220;", "&#8221;", "&#8211;", "&#8212;","â€”", "â€“", ",", "<",">", "/", "?");
	$clean = trim(str_replace($strip, "", strip_tags($string)));
	$clean = preg_replace('/\s+/', "-", $clean);
	$clean = ($anal) ? preg_replace("/[^a-zA-Z0-9]/", "", $clean) : $clean ;
	return ($force_lowercase) ?
	(function_exists('mb_strtolower')) ?
	mb_strtolower($clean, 'UTF-8') :
	strtolower($clean) :
	$clean;
}

function MakePropertyValue($name,$value,$osm){
	$oStruct = $osm->Bridge_GetStruct("com.sun.star.beans.PropertyValue");
	$oStruct->Name = $name;
	$oStruct->Value = $value;
	return $oStruct;
}
function word2pdf($doc_url, $output_url){

    //Invoke the OpenOffice.org service manager
	$osm = new COM("com.sun.star.ServiceManager") or die ("Please be sure that OpenOffice.org is installed.\n");
    //Set the application to remain hidden to avoid flashing the document onscreen	
	$args = array($this->MakePropertyValue("Hidden",true,$osm));
    //Launch the desktop
	$oDesktop = $osm->createInstance("com.sun.star.frame.Desktop");
    //Load the .doc file, and pass in the "Hidden" property from above
	$oWriterDoc = $oDesktop->loadComponentFromURL($doc_url,"_blank", 0, $args);
    //Set up the arguments for the PDF output
	$export_args = array($this->MakePropertyValue("FilterName","writer_pdf_Export",$osm));
    //print_r($export_args);
    //Write out the PDF
	$oWriterDoc->storeToURL($output_url,$export_args);
	$oWriterDoc->close(true);
} 
}
