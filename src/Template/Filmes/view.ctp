<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Filme $filme
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Filme'), ['action' => 'edit', $filme->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Filme'), ['action' => 'delete', $filme->id], ['confirm' => __('Are you sure you want to delete # {0}?', $filme->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Filmes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Filme'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="filmes view large-9 medium-8 columns content">
    <h3><?= h($filme->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Nome Filme') ?></th>
            <td><?= h($filme->nome_filme) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($filme->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($filme->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($filme->modified) ?></td>
        </tr>
    </table>
</div>
