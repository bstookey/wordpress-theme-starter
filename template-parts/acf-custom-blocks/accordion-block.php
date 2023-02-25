<?php

/* Accordion Block */

$blockid = $block['id'];
$post_type = get_field('post_type');
if ($post_type) {
    $posts = get_field('posts');
} else {
    $posts = get_field('faqs');
    $faqs = $posts['faq'];
}

//print_r($faqs);

$classes = '';
if (!empty($block['className'])) {
    $classes .= sprintf(' %s', $block['className']);
}
$block_name = 'accordion';
$classnames = array($block_name, '');
$classnames[] .= trim($classes);
?>
<?php if ($post_type) : ?>
    <section <?php echo $block['id'] ? 'id="' . $block['id'] . '"' : '' ?> class="<?= $block_name ?>-wrapper">
        <?php if ($posts) { ?>
            <div class="post-accordion-list <?= esc_attr(implode(' ', array_filter($classnames))) ?>">
                <?php foreach ($posts as $post) :
                    $id = $post->ID;
                    $slug = $post->post_name;
                    $content = apply_filters('the_content', get_post_field('post_content', $id));
                ?>
                    <div class="accordion-item <?= $block_name ?>-item">
                        <div id="heading-<?= $slug ?>" class="accordion-item-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#<?= $slug ?>" aria-expanded="false" aria-controls="<?= $slug ?>">
                                <span class="question"><?= $post->post_title ?></span>
                                <div class="plus-minus"></div>
                            </button>
                        </div>
                        <div id="<?= $slug ?>" class="accordion-item-content collapse" aria-labelledby="heading-<?= $slug ?>" data-bs-parent="#<?= $blockid ?>">
                            <div class="accordion-body">
                                <?= $content; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php } ?>
    </section>
<?php else : ?>
    <section <?php echo $block['id'] ? 'id="' . $block['id'] . '"' : '' ?> class="<?= $block_name ?>-wrapper <?= esc_attr(implode(' ', array_filter($classnames))) ?>">
        <?php if ($faqs) { ?>
            <div class="post-accordion-list">
                <?php foreach ($faqs as $faq) :
                    $question = $faq['question'];
                    $slug = sanitize_title($question);
                    $answer_type = $faq['answer_type'];
                    $answer = $faq['answer'];
                ?>
                    <div class="accordion-item">
                        <div id="heading-<?= $slug ?>" class="accordion-item-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#<?= $slug ?>" aria-expanded="false" aria-controls="collapseOne">
                                <span class="question"><?= $question ?></span>
                                <div class="plus-minus"></div>
                            </button>
                        </div>
                        <div id="<?= $slug ?>" class="accordion-item-content collapse" aria-labelledby="heading-<?= $slug ?>" data-bs-parent="#<?= $blockid ?>">
                            <div class="accordion-body">
                                <?php if ($answer_type == 'standard') : ?>
                                    <?= $answer ?>
                                    <?php elseif ($answer_type == 'docs') :
                                    $docs = $faq['documents'];
                                    $docs_featured = $faq['documents_featured'];

                                    if ($docs_featured) : ?>
                                        <div class="documents-wrapper grid featured">
                                            <?php
                                            foreach ($docs_featured as $doc) :
                                                $id = $doc->ID;
                                            ?>
                                                <div class="doc-item">
                                                    <?php echo do_shortcode('[download id="' . $id . '" template="image"]');
                                                    ?>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    <?php endif ?>
                                    <?php if ($docs) : ?>
                                        <div class="documents-wrapper grid">
                                            <?php
                                            foreach ($docs as $doc) :
                                                $id = $doc->ID;
                                            ?>
                                                <div class="doc-item">
                                                    <?php echo do_shortcode('[download id="' . $id . '" template="image"]');
                                                    ?>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    <?php endif ?>
                                <?php endif ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php } ?>
    </section>
<?php endif ?>