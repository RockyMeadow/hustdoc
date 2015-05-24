<?php echo $this->Form->create('Document', array(
        'url' => array_merge(
                    array(
                    'action' => 'find'
                ),
                $this->params['pass']
                )
             )
        );  
        echo $this->Form->input('name', array(
            'div' => false
            )
        );
        echo $this->Form->input('author', array(
            'div' => false
            )
        );

        echo $this->Form->submit(__('Search'), array(
            'div' => false
            )
        );
        echo $this->Form->end();
        ?>

<?php $count=0; ?>

    <h2><?php echo __('Documents'); ?></h2>
    <table cellpadding="0" cellspacing="0">
    <thead>
    <tr>
            <th><?php echo 'No.'; ?></th>
            <th><?php echo $this->Paginator->sort('name'); ?></th>
            <th><?php echo $this->Paginator->sort('user_id'); ?></th>
            <th><?php echo $this->Paginator->sort('author'); ?></th>
            <th><?php echo $this->Paginator->sort('views'); ?></th>
            <th><?php echo $this->Paginator->sort('downloads'); ?></th>
            <th><?php echo $this->Paginator->sort('created'); ?></th>
            <th><?php echo $this->Paginator->sort('modified'); ?></th>
            <th class="actions"><?php echo __('Actions'); ?></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($documents as $document): ?>
        <?php $count++; ?>
    <tr>
        <td><?php echo $count; ?></td>
        <td><?php echo h($document['Document']['name']); ?>&nbsp;</td>
        <td>
            <?php echo $this->Html->link($document['User']['username'], array('controller' => 'users', 'action' => 'view', $document['User']['username'])); ?>
        </td>
        <td><?php echo h($document['Document']['author']); ?>&nbsp;</td>
        <td><?php echo h($document['Document']['views']); ?>&nbsp;</td>
        <td><?php echo h($document['Document']['downloads']); ?>&nbsp;</td>
        <td><?php echo h($document['Document']['created']); ?>&nbsp;</td>
        <td><?php echo h($document['Document']['modified']); ?>&nbsp;</td>

        <td class="actions">
            <?php echo $this->Html->link(__('View'), array('action' => 'view', $document['Document']['id'])); ?>
            <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $document['Document']['id'])); ?>
            <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $document['Document']['id'],$document['Document']['name']), array('confirm' => __('Are you sure you want to delete # %s?', $document['Document']['id']))); ?>
        </td>
    </tr>
<?php endforeach; ?>