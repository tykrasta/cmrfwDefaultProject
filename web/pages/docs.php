<?php
$code = new DB;
$code->select('*', 'cmr_code');
//dump($code->result);
?>
<section>
    <table class='sidenav'>
        <tr class='sideul dark'>
            <?php foreach ($code->result as $key => $value) : ?>
                <td ><a href="#<?= $value['titre'] ?>"><?= $value['titre'] ?></a></td>
            <?php endforeach ?>
        </tr>
    </table>
</section>
<section class="large right">
    <?php foreach ($code->result as $key => $value) : ?>
        <article class="docs"  id="<?= $value['titre'] ?>">
            <h1 class="xlarge gold"><?= $value['titre'] ?></h1>
            <pre>
    <code class="language-php">
    <?= $value['code'] ?>
    </code>
    </pre>
            <h3>Usage</h3>
            <pre>
    <code class="language-php">
    <?= $value['demo'] ?>
    </code>
    </pre>
            <h3>Rendu</h3>
            <?php eval($value['demo']); ?>
        </article>
        <hr>
    <?php endforeach ?>
</section>