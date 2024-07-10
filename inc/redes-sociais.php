<?php $contato = get_page_by_title('contato')->ID; ?>
<ul>
    <?php 
        $itens = get_field('redes_sociais', $contato);
        if(isset($itens)){
            foreach($itens as $item){					 
    ?>	
	    <li><a href="<?php echo $item['link_social'] ?>" target="_blank"><img src="<?php echo $item['imagem_social'] ?>" alt="<?php echo $item['nome_social'] ?>"></a></li>
    <?php }} ?>
</ul>