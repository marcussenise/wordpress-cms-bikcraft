<?php
    // Função para registrar os Scripts e o CSS
    function bikcraft_scripts() {
        wp_register_script( 'simple-slide', get_template_directory_uri() . '/js/simple-slide.js', [], false, true);
        wp_register_script( 'simple-anime', get_template_directory_uri() . '/js/simple-anime.js', [], false, true);
        wp_register_script( 'simple-form', get_template_directory_uri() . '/js/simple-form.js', [], false, true);
        wp_register_script( 'script', get_template_directory_uri() . '/js/script.js', ['simple-slide', 'simple-anime', 'simple-form'], false, true);
        wp_enqueue_script( 'script' );
    }
    add_action( 'wp_enqueue_scripts', 'bikcraft_scripts' );
    
    function bikcraft_css() {
        wp_register_style( 'bikcraft_style', get_template_directory_uri() . '/style.css', [], false, false);
        wp_enqueue_style( 'bikcraft_style' );
    }
    add_action( 'wp_enqueue_scripts', 'bikcraft_css' );

    // Funções para Limpar o Header
    remove_action('wp_head', 'rsd_link');
    remove_action('wp_head', 'wlwmanifest_link');
    remove_action('wp_head', 'start_post_rel_link', 10, 0 );
    remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
    remove_action('wp_head', 'feed_links_extra', 3);
    remove_action('wp_head', 'wp_generator');
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('admin_print_styles', 'print_emoji_styles');
     
    // Habilitar Menus
    add_theme_support('menus');

    // Registrar Menu
    function register_my_menu() {
        register_nav_menu('menu-principal',__( 'Menu Principal' ));
      }
    add_action( 'init', 'register_my_menu' );

    function get_field($key, $page_id = 0) {
        $id = $page_id !== 0 ? $page_id : get_the_ID();
        return get_post_meta( $id, $key, true);
    };

    function the_field($key, $page_id = 0) {
        echo get_field($key, $page_id);
    };

    add_action('cmb2_admin_init', 'cmb2_fields_home');

    function cmb2_fields_home() {
        $cmb = new_cmb2_box([
            'id' => 'home_box', //id deve ser único
            'title' => 'Home',
            'object_types' => ['page'], //tipo de post
            'show_on' => [
                'key' => 'page-template',
                'value' => 'page-home.php',
            ], // modelo de página
        ]);
        $cmb->add_field([
            'name' => 'Título Introdução',
            'id' => 'titulo_introducao',
            'type' => 'text'
        ]);
        $cmb->add_field([
            'name' => 'Quote Introdução',
            'id' => 'quote_introducao',
            'type' => 'text'
        ]);
        $cmb->add_field([
            'name' => 'Citação Introdução',
            'id' => 'citacao_introducao',
            'type' => 'text'
        ]);
        $cmb->add_field([
            'name' => 'Chamada Produtos',
            'id' => 'chamada_produtos',
            'type' => 'text'
        ]);
        $cmb->add_field([
            'name' => 'Chamada Portfolio',
            'id' => 'chamada_portfolio',
            'type' => 'text'
        ]);
        $cmb->add_field([
            'name' => 'Background Home',
            'id' => 'background_home',
            'type' => 'file',
            'options' => [
                'url' => false,
            ],
        ]);
    };

    add_action('cmb2_admin_init', 'cmb2_fields_sobre');

    function cmb2_fields_sobre() {
        $cmb = new_cmb2_box([
            'id' => 'sobre_box', //id deve ser único
            'title' => 'Sobre',
            'object_types' => ['page'], //tipo de post
            'show_on' => [
                'key' => 'page-template',
                'value' => 'page-sobre.php',
            ], // modelo de página
        ]);
        $cmb->add_field([
            'name' => 'Missão',
            'id' => 'missao',
            'type' => 'textarea',
        ]);
        $cmb->add_field([
            'name' => 'Valores',
            'id' => 'valores',
            'type' => 'wysiwyg',
        ]);
        $cmb->add_field([
            'name' => 'Imagem Equipe',
            'id' => 'imagem_equipe',
            'type' => 'file',
            'options' => [
                'url' => false,
            ],
        ]);
        $cmb->add_field([
            'name' => 'Título Qualidade',
            'id' => 'titulo_qualidade',
            'type' => 'text'
        ]);
        $cmb->add_field([
            'name' => 'Logo Bikcraft',
            'id' => 'logo_bikcraft',
            'type' => 'file',
            'options' => [
                'url' => false,
            ],
        ]);
        $items = $cmb->add_field([
            'name' => 'Item Qualidade',
            'id' => 'item_qualidade',
            'type' => 'group',
            'repeatable' => true,
            'options' => [
                'group_title' => 'Item {#}',
                'add_button' => 'Adicionar',
                'remove_button' => 'Remover',
                'sortable' => true,
            ]
        ]);
        $cmb->add_group_field($items,[
            'name' => 'Título Item',
            'id' => 'titulo_item_qualidade',
            'type' => 'text',
        ]);
        $cmb->add_group_field($items,[
            'name' => 'Descrição Item',
            'id' => 'descricao_item_qualidade',
            'type' => 'text',
            'attributes' => array(
                'maxlength' => '110',
            ),
        ]);
        $cmb->add_field([
            'name' => 'Chamada Sobre',
            'id' => 'chamada_sobre',
            'type' => 'text',
        ]);
    };
    add_action('cmb2_admin_init', 'cmb2_fields_portfolio');

    function cmb2_fields_portfolio() {
        $cmb = new_cmb2_box([
            'id' => 'portfolio_box', //id deve ser único
            'title' => 'Portfolio',
            'object_types' => ['page'], //tipo de post
            'show_on' => [
                'key' => 'page-template',
                'value' => 'page-portfolio.php',
            ], // modelo de página
        ]);
        $imagens = $cmb->add_field([
            'name' => 'Imagens Bicicletas Qualidade',
            'id' => 'item_portfolio',
            'type' => 'group',
            'repeatable' => true,
            'options' => [
                'group_title' => 'Item {#}',
                'add_button' => 'Adicionar',
                'remove_button' => 'Remover',
                'sortable' => true,
            ]
        ]);
        $cmb->add_group_field($imagens, [
            'name' => 'Portfolio Imagem',
            'id' => 'portfolio_imagem1',
            'type' => 'file',
            'options' => [
                'url' => false,
            ],
        ]);
        $cmb->add_group_field($imagens, [
            'name' => 'Portfolio Imagem Descrição 1',
            'id' => 'portfolio_imagem_descricao1',
            'type' => 'text',
        ]);
        $cmb->add_group_field($imagens, [
            'name' => 'Portfolio Imagem',
            'id' => 'portfolio_imagem2',
            'type' => 'file',
            'options' => [
                'url' => false,
            ],
        ]);
        $cmb->add_group_field($imagens, [
            'name' => 'Portfolio Imagem Descrição 2',
            'id' => 'portfolio_imagem_descricao2',
            'type' => 'text',
        ]);
        $cmb->add_group_field($imagens, [
            'name' => 'Portfolio Imagem',
            'id' => 'portfolio_imagem3',
            'type' => 'file',
            'options' => [
                'url' => false,
            ],
        ]);
        $cmb->add_group_field($imagens, [
            'name' => 'Portfolio Imagem Descrição 3',
            'id' => 'portfolio_imagem_descricao3',
            'type' => 'text',
        ]);
        $cmb->add_field([
            'name' => 'Chamada Portfolio',
            'id' => 'chamada_portfolio',
            'type' => 'text'
        ]);
        $quotes = $cmb->add_field([
            'name' => 'Quotes',
            'id' => 'quote_portfolio',
            'type' => 'group',
            'repeatable' => true,
            'options' => [
                'group_title' => 'Quote {#}',
                'add_button' => 'Adicionar',
                'remove_button' => 'Remover',
                'sortable' => true,
            ]
        ]);
        $cmb->add_group_field($quotes, [
            'name' => 'Quote',
            'id' => 'quote',
            'type' => 'textarea',
        ]);
        $cmb->add_group_field($quotes, [
            'name' => 'Nome Quote',
            'id' => 'nome_quote',
            'type' => 'text',
        ]);
    };

    add_action('cmb2_admin_init', 'cmb2_fields_banner');
    function cmb2_fields_banner() {
        $cmb = new_cmb2_box([
            'id' => 'banner_imagens', //id deve ser único
            'title' => 'Imagem banner',
            'object_types' => ['page'], //tipo de post
            'show_on' => [
                'key' => 'page-template',
                'value' => ['page-portfolio.php', 'page-contato.php', 'page-produtos.php', 'page-sobre.php'],
            ], // modelo de página
        ]);
        $cmb->add_field([
            'name' => 'Imagem banner',
            'id' => 'background_interno',
            'type' => 'file',
            'options' => [
                'url' => false,
            ],
        ]);
        $cmb->add_field([
            'name' => 'Texto banner',
            'id' => 'subtitulo',
            'type' => 'text',
        ]);
    }

    //Custom Image Sizes
    function my_custom_sizes(){
        add_image_size( 'large', 1400, 380, true );
        add_image_size( 'medium', 768, 380, true );
    }
    add_action( 'after_setup_theme', 'my_custom_sizes');

    //Custom Fields Contato
    add_action('cmb2_admin_init', 'cmb2_fields_contato');
    function cmb2_fields_contato() {
        $cmb = new_cmb2_box([
            'id' => 'contato_box', //id deve ser único
            'title' => 'Contato',
            'object_types' => ['page'], //tipo de post
            'show_on' => [
                'key' => 'page-template',
                'value' => ['page-contato.php'],
            ], // modelo de página
        ]);
        $cmb->add_field([
            'name' => 'Background Footer',
            'id' => 'background_footer',
            'type' => 'file',
            'options' => [
                'url' => false,
            ],
        ]);
        $cmb->add_field([
            'name' => 'Frase Footer',
            'id' => 'frase_footer',
            'type' => 'text',
        ]);
        $cmb->add_field([
            'name' => 'Autor Footer',
            'id' => 'autor_footer',
            'type' => 'text',
        ]);
        $cmb->add_field([
            'name' => 'Resumo História',
            'id' => 'resumo_historia',
            'type' => 'textarea',
        ]);
        $cmb->add_field([
            'name' => 'Telefone',
            'id' => 'telefone',
            'type' => 'text',
        ]);
        $cmb->add_field([
            'name' => 'Email',
            'id' => 'email',
            'type' => 'text',
        ]);
        $cmb->add_field([
            'name' => 'Endereço 1',
            'id' => 'endereco1',
            'type' => 'text',
        ]);
        $cmb->add_field([
            'name' => 'Endereço 2',
            'id' => 'endereco2',
            'type' => 'text',
        ]);
        $cmb->add_field([
            'name' => 'Link mapa',
            'id' => 'link_mapa',
            'type' => 'text',
        ]);
        $cmb->add_field([
            'name' => 'Imagem mapa',
            'id' => 'imagem_mapa',
            'type' => 'file',
            'options' => [
                'url' => false,
            ],
        ]);
        $cmb->add_field([
            'name' => 'Texto mapa',
            'id' => 'texto_mapa',
            'type' => 'text',
        ]);
        $redes = $cmb->add_field([
            'name' => 'Redes Sociais',
            'id' => 'redes_sociais',
            'type' => 'group',
            'repeatable' => true,
            'options' => [
                'group_title' => 'Item {#}',
                'add_button' => 'Adicionar',
                'remove_button' => 'Remover',
                'sortable' => true,
            ]
        ]);
        $cmb->add_group_field($redes, [
            'name' => 'Link Rede Social',
            'id' => 'link_social',
            'type' => 'text',
        ]);
        $cmb->add_group_field($redes, [
            'name' => 'Imagem Rede Social',
            'id' => 'imagem_social',
            'type' => 'file',
            'options' => [
                'url' => false,
            ],
        ]);
        $cmb->add_group_field($redes, [
            'name' => 'Nome da Rede Social',
            'id' => 'nome_social',
            'type' => 'text',
        ]);
       
    }

    //Custom Post Type
    function custom_post_type_produtos() {
        register_post_type('produtos', array(
            'label' => 'Produtos',
            'description' => 'Produtos',
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'capability_type' => 'post',
            'map_meta_cap' => true,
            'hierarchical' => false,
            'rewrite' => array('slug' => 'produtos', 'with_front' => true),
            'query_var' => true,
            'supports' => array('title', 'editor', 'page-attributes','post-formats'),
    
            'labels' => array (
                'name' => 'Produtos',
                'singular_name' => 'Produto',
                'menu_name' => 'Produtos',
                'add_new' => 'Adicionar Novo',
                'add_new_item' => 'Adicionar Novo Produto',
                'edit' => 'Editar',
                'edit_item' => 'Editar Produto',
                'new_item' => 'Novo Produto',
                'view' => 'Ver Produto',
                'view_item' => 'Ver Produto',
                'search_items' => 'Procurar Produtos',
                'not_found' => 'Nenhum Produto Encontrado',
                'not_found_in_trash' => 'Nenhum Produto Encontrado no Lixo',
            )
        ));
    }
    add_action('init', 'custom_post_type_produtos');

    function cmb2_fields_single_produto_template() {
        $cmb = new_cmb2_box([
            'id' => 'single_produto_box', //id deve ser único
            'title' => 'Single Produto',
            'object_types' => ['produtos'], //tipo de post
            'show_on' => [
                // 'key' => 'page-template',
                'value' => ['single-produtos.php'],
            ], // modelo de página
        ]);
        $cmb->add_field([
            'name' => 'Foto Produto1',
            'id' => 'foto_produto1',
            'type' => 'file',
            'options' => [
                'url' => false,
            ],
        ]);
        $cmb->add_field([
            'name' => 'Ícone Produto',
            'id' => 'icone_produto',
            'type' => 'file',
            'options' => [
                'url' => false,
            ],
        ]);
        $cmb->add_field([
            'name' => 'Foto Produto2',
            'id' => 'foto_produto2',
            'type' => 'file',
            'options' => [
                'url' => false,
            ],
        ]);
        $cmb->add_field([
            'name' => 'Resumo Produto',
            'id' => 'resumo_produto',
            'type' => 'text',
        ]);
    }
    add_action('cmb2_admin_init', 'cmb2_fields_single_produto_template');

    add_action('cmb2_admin_init', 'cmb2_fields_produto');
    function cmb2_fields_produto() {
        $cmb = new_cmb2_box([
            'id' => 'produto_page_box', //id deve ser único
            'title' => 'Produtos',
            'object_types' => ['page'], //tipo de post
            'show_on' => [
                'key' => 'page-template',
                'value' => ['page-produtos.php'],
            ], // modelo de página
        ]);

        $cmb->add_field([
            'name' => 'Especificações',
            'id' => 'especificacoes',
            'type' => 'wysiwyg',
        ]);
    }

?>