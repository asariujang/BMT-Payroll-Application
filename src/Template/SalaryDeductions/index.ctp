<nav class="large-2 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Menu : ') ?></li>
        <li><?= $this->Html->link(__('Tambah Data'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="deductions index large-10 medium-8 columns content">
    <h3><?= __('Potongan Gaji') ?></h3>
    <table cellpadding="0" cellspacing="0" class="large-8">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('Nama Potongan') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Pagawai') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Nominal') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($deductions as $salaryDeduction): ?>
            <tr>
                <td> <?= $this->Html->link(h($salaryDeduction->name), ['action' => 'view', $salaryDeduction->id]) ?></td>
                <td><?= $salaryDeduction->has('user') ? $this->Html->link($salaryDeduction->user->name, ['controller' => 'Users', 'action' => 'view', $salaryDeduction->user->id]) : '' ?></td>
                <td><?= $this->Number->format($salaryDeduction->value) ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
