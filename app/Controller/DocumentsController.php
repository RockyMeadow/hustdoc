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

/**
 * index method
 *
 * @return void
 */

	public function admin_download($filename)
				{
					$path = WWW_ROOT. DS . 'uploads'.DS.$this->Auth->user('id'). DS;
					$this->autoRender = false;
					$this->response->file($path . $filename);
					return $this->response;
				}

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
	public function admin_texteditor() {

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
			//Upload proceeding
			$folder = new Folder();
			if ($folder->create(WWW_ROOT. DS . 'uploads'.DS. $this->Auth->user('id')))
			{
				$filepath = WWW_ROOT. DS . 'uploads'.DS.$this->Auth->user('id'). DS.$this->data['Document']['submittedfile']['name'];
				move_uploaded_file($this->data['Document']['submittedfile']['tmp_name'],$filepath);
			}
			$this->request->data['Document']['filename'] = $this->data['Document']['submittedfile']['name'];
			// *****************
			if ($this->Document->save($this->request->data)) {
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

	public function upload() {
	if (AuthComponent::user()){
		if ($this->request->is('post') || $this->request->is('put')) {
			$this->Document->create();
			$this->Document->validator()->remove('Topic');
			//Upload proceeding
			$folder = new Folder();
			if ($folder->create(WWW_ROOT. DS . 'uploads'.DS. $this->Auth->user('id')))
			{
				$filepath = WWW_ROOT. DS . 'uploads'.DS.$this->Auth->user('id'). DS.$this->data['Document']['submittedfile']['name'];
				move_uploaded_file($this->data['Document']['submittedfile']['tmp_name'],$filepath);
			}
			$this->request->data['Document']['name'] = $this->data['Document']['submittedfile']['name'];
			$this->request->data['Document']['type'] = $this->data['Document']['submittedfile']['type'];
			$this->request->data['Document']['size'] = $this->data['Document']['submittedfile']['size'];
			// *****************
			if ($this->Document->save($this->request->data)) {
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
			$data = $this->data['Document']['body'];
			if ($this->Document->save($this->request->data)) {
				$this->Session->setFlash(__('The document has been saved.'));
				
				$folder = new Folder();
				if ($folder->create(WWW_ROOT. DS . 'uploads'.DS. $this->Auth->user('id'). DS. $this->Document->id))
				{
					$filepath = WWW_ROOT. DS . 'uploads'.DS.$this->Auth->user('id'). DS. $this->Document->id .DS .$this->data['Document']['name'].".html";
					
				}
    		
    			$file = fopen($filepath, "w"); 
   			    fwrite($file, $data);
  				fclose($file);
  				return $this->redirect(array('action' => 'admin_view',$this->Document->id));
					
					} else {
				$this->Session->setFlash(__('The document could not be saved. Please, try again.'));
			}
		}
		$users = $this->Document->User->find('list');
		$topics = $this->Document->Topic->find('list');
		$this->set(compact('users', 'topics'));

	}

	public function admin_upload() {
		if ($this->request->is('post')) {
			$this->Document->create();
			$this->Document->validator()->remove('Topic');
			//Upload proceeding
			$folder = new Folder();
			if ($folder->create(WWW_ROOT. DS . 'uploads'.DS. $this->Auth->user('id')))
			{
				$filepath = WWW_ROOT. DS . 'uploads'.DS.$this->Auth->user('id'). DS.$this->data['Document']['submittedfile']['name'];
				move_uploaded_file($this->data['Document']['submittedfile']['tmp_name'],$filepath);
			}
			$this->request->data['Document']['name'] = $this->data['Document']['submittedfile']['name'];
			$this->request->data['Document']['type'] = $this->data['Document']['submittedfile']['type'];
			$this->request->data['Document']['size'] = $this->data['Document']['submittedfile']['size'];

			// *****************

			if ($this->Document->save($this->request->data)) {
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


	public function admin_convert($id=null){
		if (!$this->Document->exists($id)) {
			throw new NotFoundException(__('Invalid document'));
		}
		$document = $this->Document->find('first', array('conditions' => array('Document.id' => $id)));
		require_once 'C:\xampp\htdocs\hustdoc.vn\app\lib\htmltodocx\phpword\PHPWord.php';
		require_once 'C:\xampp\htdocs\hustdoc.vn\app\lib\htmltodocx\simplehtmldom\simple_html_dom.php';
		require_once 'C:\xampp\htdocs\hustdoc.vn\app\lib\htmltodocx\htmltodocx_converter\h2d_htmlconverter.php';
		require_once 'C:\xampp\htdocs\hustdoc.vn\app\lib\htmltodocx\example_files\styles.inc';

		// Functions to support this example.
		require_once 'C:\xampp\htdocs\hustdoc.vn\app\lib\htmltodocx\documentation\support_functions.inc';

		// HTML fragment we want to parse:

		$html = file_get_contents('C:/xampp/htdocs/hustdoc.vn/app/webroot/uploads/'.$document['Document']['user_id']. '/'. $document['Document']['id'].'/'.$document['Document']['name'].'.html');
		// $html = file_get_contents('test/table.html');
		 
		// New Word Document:
		$phpword_object = new PHPWord();
		$section = $phpword_object->createSection();

		// HTML Dom object:
		$html_dom = new simple_html_dom();
		$html_dom->load('<html><body>' . $html . '</body></html>');
		// Note, we needed to nest the html in a couple of dummy elements.

		// Create the dom array of elements which we are going to work on:
		$html_dom_array = $html_dom->find('html',0)->children();

		// We need this for setting base_root and base_path in the initial_state array
		// (below). We are using a function here (derived from Drupal) to create these
		// paths automatically - you may want to do something different in your
		// implementation. This function is in the included file 
		// documentation/support_functions.inc.
		$paths = htmltodocx_paths();

		// Provide some initial settings:
		$initial_state = array(
		  // Required parameters:
		  'phpword_object' => &$phpword_object, // Must be passed by reference.
		  // 'base_root' => 'http://test.local', // Required for link elements - change it to your domain.
		  // 'base_path' => '/htmltodocx/documentation/', // Path from base_root to whatever url your links are relative to.
		  'base_root' => $paths['base_root'],
		  'base_path' => $paths['base_path'],
		  // Optional parameters - showing the defaults if you don't set anything:
		  'current_style' => array('size' => '11'), // The PHPWord style on the top element - may be inherited by descendent elements.
		  'parents' => array(0 => 'body'), // Our parent is body.
		  'list_depth' => 0, // This is the current depth of any current list.
		  'context' => 'section', // Possible values - section, footer or header.
		  'pseudo_list' => TRUE, // NOTE: Word lists not yet supported (TRUE is the only option at present).
		  'pseudo_list_indicator_font_name' => 'Wingdings', // Bullet indicator font.
		  'pseudo_list_indicator_font_size' => '7', // Bullet indicator size.
		  'pseudo_list_indicator_character' => 'l ', // Gives a circle bullet point with wingdings.
		  'table_allowed' => TRUE, // Note, if you are adding this html into a PHPWord table you should set this to FALSE: tables cannot be nested in PHPWord.
		  'treat_div_as_paragraph' => TRUE, // If set to TRUE, each new div will trigger a new line in the Word document.
		      
		  // Optional - no default:    
		  'style_sheet' => htmltodocx_styles_example(), // This is an array (the "style sheet") - returned by htmltodocx_styles_example() here (in styles.inc) - see this function for an example of how to construct this array.
		  );    

		// Convert the HTML and put it into the PHPWord object
		htmltodocx_insert_html($section, $html_dom_array[0]->nodes, $initial_state);

		// Clear the HTML dom object:
		$html_dom->clear(); 
		unset($html_dom);

		// Save File
		$h2d_file_uri = tempnam('', 'htd');
		$objWriter = PHPWord_IOFactory::createWriter($phpword_object, 'Word2007');
		$objWriter->save($h2d_file_uri);

		// Download the file:
		header('Content-Description: File Transfer');
		header('Content-Type: application/octet-stream');
		header('Content-Disposition: attachment; filename=example.docx');
		header('Content-Transfer-Encoding: binary');
		header('Expires: 0');
		header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
		header('Pragma: public');
		header('Content-Length: ' . filesize($h2d_file_uri));
		ob_clean();
		flush();
		$status = readfile($h2d_file_uri);
		unlink($h2d_file_uri);
		exit;
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
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null,$filename) {
		$this->Document->id = $id;
		$this->Session->setFlash($this->Document->filename);
		if (!$this->Document->exists()) {
			throw new NotFoundException(__('Invalid document'));
		}
		$this->request->allowMethod('post', 'delete');
		//Delete stored file
		$file = new File(WWW_ROOT. DS . 'uploads'.DS.$this->Auth->user('id'). DS. $filename);
		$file->delete();
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
}
