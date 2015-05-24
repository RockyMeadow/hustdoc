<?php
App::uses('AppModel', 'Model');
/**
 * Document Model
 *
 * @property User $User
 * @property Comment $Comment
 * @property Report $Report
 * @property Topic $Topic
 */
class Document extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */


<<<<<<< HEAD

=======
public $actsAs = array(
        'Search.Searchable'
    );
>>>>>>> 47390866753fa68f19052ea29ed8ce1f8d1503c1
public $displayField = 'name';


public $validate = array(
	'name' => array(
		
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			
		),
	'user_id' => array(
		'numeric' => array(
			'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	'summary' => array(
		'notEmpty' => array(
			'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),

	'likes' => array(
		'numeric' => array(
			'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	'body' => array(
		'notEmpty' => array(
			'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	'size' => array(
		'numeric' => array(
			'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	'author' => array(
		
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			
		),
	'views' => array(
		'numeric' => array(
			'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	'downloads' => array(
		'numeric' => array(
			'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	'visible' => array(
		'valid' => array(
			'rule' => array('inList', array('only me', 'member only','public')),
			'message' => 'Please enter a valid visiblity',
			'allowEmpty' => false
			)
		),
	'Topic' => array(
		'multiple' => array(
			'rule' => array('multiple', array('min' => 1)),
			'message' => 'You need to select at least one Topic',
			'required' => true,
			),
		),
	'submittedfile' => array(
		'rule' => array(
			'extension',
			array('pdf', 'doc', 'docx')
			),
		'message' => 'Please upload a valid document (pdf,doc,docx).'
		)
	);


public $filterArgs = array(
	'name' => array(
            'type' => 'like',
            'field' => 'name'

        ),
    'author' => array(
            'type' => 'like',
            'field' => 'author'
        ),
    'user_id' => array(
            'type' => 'value'
        ),
    'enhanced_search' => array(
            'type' => 'like',
            'encode' => true,
            'before' => false,
            'after' => false,
            'field' => array(
                'ThisModel.name', 'OtherModel.name'
            )
        )
    );

 // Or conditions with like
    public function orConditions($data = array()) {
        $filter = $data['filter'];
        $condition = array(
            'OR' => array(
                $this->alias . '.title LIKE' => '%' . $filter . '%',
                $this->alias . '.body LIKE' => '%' . $filter . '%',
            )
        );
        return $condition;
    }


public function beforeSave($options = array()){
	foreach (array_keys($this->hasAndBelongsToMany) as $model){
		if(isset($this->data[$this->name][$model])){
			$this->data[$model][$model] = $this->data[$this->name][$model];
			unset($this->data[$this->name][$model]);
		}
	}
	return true;
}

public function isOwnedBy($document, $user) {
	return $this->field('id', array('id' => $document, 'user_id' => $user)) !== false;
}

public function getDocumentsByTopicId($topicId = null) {
    if(empty($topicId)) return false;
    $documents = $this->find('all', array(
        'joins' => array(
             array('table' => 'documents_topics',
                'alias' => 'DocumentsTopics',
                'type' => 'INNER',
                'conditions' => array(
                    'DocumentsTopics.topic_id' => $topicId,
                    'DocumentsTopics.document_id = Document.id'
                )
            )
        ),
        'group' => 'Document.id'
    ));
    return $documents;
}

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
public $belongsTo = array(
	'User' => array(
		'className' => 'User',
		'foreignKey' => 'user_id',
		'conditions' => '',
		'fields' => '',
		'order' => ''
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
public $hasMany = array(
	'Comment' => array(
		'className' => 'Comment',
		'foreignKey' => 'document_id',
		'dependent' => false,
		'conditions' => '',
		'fields' => '',
		'order' => '',
		'limit' => '',
		'offset' => '',
		'exclusive' => '',
		'finderQuery' => '',
		'counterQuery' => ''
		),
	'Report' => array(
		'className' => 'Report',
		'foreignKey' => 'document_id',
		'dependent' => false,
		'conditions' => '',
		'fields' => '',
		'order' => '',
		'limit' => '',
		'offset' => '',
		'exclusive' => '',
		'finderQuery' => '',
		'counterQuery' => ''
		)
	);


/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
public $hasAndBelongsToMany = array(
	'Topic' => array(
		'className' => 'Topic',
		'joinTable' => 'documents_topics',
		'foreignKey' => 'document_id',
		'associationForeignKey' => 'topic_id',
		'unique' => 'keepExisting',
		'conditions' => '',
		'fields' => '',
		'order' => '',
		'limit' => '',
		'offset' => '',
		'finderQuery' => '',
		)
	);

}
