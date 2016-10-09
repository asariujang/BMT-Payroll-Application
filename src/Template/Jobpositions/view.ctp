<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Jobposition'), ['action' => 'edit', $jobposition->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Jobposition'), ['action' => 'delete', $jobposition->id], ['confirm' => __('Are you sure you want to delete # {0}?', $jobposition->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Jobpositions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Jobposition'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="jobpositions view large-9 medium-8 columns content">
    <h3><?= h($jobposition->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($jobposition->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($jobposition->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Position Allowance') ?></th>
            <td><?= $this->Number->format($jobposition->position_allowance) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Communication Allowance') ?></th>
            <td><?= $this->Number->format($jobposition->communication_allowance) ?></td>
        </tr>
    </table>
</div>
