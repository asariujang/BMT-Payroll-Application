<nav class="large-2 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Menu :') ?></li>
        <li><?= $this->Html->link(__('List Salary Allowances'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Payrolls'), ['controller' => 'Payrolls', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Payroll'), ['controller' => 'Payrolls', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="salaryAllowances form large-7 medium-8 columns content float-left">
    <?= $this->Form->create($salaryAllowance) ?>
    <fieldset>
        <legend><?= __('Add Salary Allowance') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('value');
            echo $this->Form->input('payrolls_id', ['options' => $payrolls]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Simpan')) ?>
    <?= $this->Form->end() ?>
</div>
