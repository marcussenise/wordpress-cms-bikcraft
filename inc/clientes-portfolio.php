<?php $portfolio = get_page_by_title('portfolio')->ID; ?>
<ul class="portfolio_lista rslides_portfolio">
<?php 
    $itens = get_field('item_portfolio', $portfolio);
    if(isset($itens)){
        foreach($itens as $item){					 
?>	
    <li>
        <div class="grid-8"><img src="<?php echo $item['portfolio_imagem1'] ?>" alt="<?php echo $item['portfolio_imagem_descricao1'] ?>"></div>
        <div class="grid-8"><img src="<?php echo $item['portfolio_imagem2'] ?>" alt="<?php echo $item['portfolio_imagem_descricao2'] ?>"></div>
        <div class="grid-16"><img src="<?php echo $item['portfolio_imagem3'] ?>" alt="<?php echo $item['portfolio_imagem_descricao3'] ?>"></div>
    </li>
    <?php }} ?>
</ul>
<?php if(!is_page('portfolio')) {?>
<div class="call">
    <p><?php the_field('chamada_portfolio', $portfolio); ?></p>
    <a href="/portfolio" class="btn">Portfólio</a>
</div>
<?php } ?>

