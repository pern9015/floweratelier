<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Astra
 * @since 1.0.0
 */

get_header(); ?>

<main id="main" class="site-main">
    <section class="tilbage">
        <a href="http://pernillestrate.dk/floweratelier/wordpress/interior/">
            <p class="tilbageknap">Tilbage</p>
        </a>
    </section>
    <article class="interior" id="produkter">
        <section>
            <img src="" alt="" class="billede_single">
        </section>
        <section>
            <h1 class="title_single"></h1>
            <p class="pris_single"></p>
            <p class="lang_beskrivelse_single"></p>
            <a href="http://pernillestrate.dk/floweratelier/wordpress/interior/">
                <div><button class="button_single">Tilføj til kurv</button> </div>
            </a>
        </section>
    </article>

    <section class="baggrund">
        <h2 class="h2_single">Du vil måske også synes om:</h2>
        <div class="flere_produkter">
            <a href="http://pernillestrate.dk/floweratelier/wordpress/produkter/louis-vuitton-catwalk-coffee-table-book/">
                <div class="img-hover-zoom2">
                    <img class="flere" src="<?php echo get_stylesheet_directory_uri();?>/assets/images/bog_louis.jpg" alt="louis-bog">
                </div>
            </a>
            <a href="http://pernillestrate.dk/floweratelier/wordpress/produkter/lyserode-bloklys/">
                <div class="img-hover-zoom2">
                    <img class="flere" src="<?php echo get_stylesheet_directory_uri();?>/assets/images/lys_lyserodpink.jpg" alt="lys">
                </div>
            </a>
            <a href="http://pernillestrate.dk/floweratelier/wordpress/produkter/velduftende-meraki-handsaebe/">
                <div class="img-hover-zoom2">
                    <img class="flere" src="<?php echo get_stylesheet_directory_uri();?>/assets/images/meraki.jpg" alt="meraki">
                </div>
            </a>
            <a href="http://pernillestrate.dk/floweratelier/wordpress/produkter/rustik-glas-vase/">
                <div class="img-hover-zoom2">
                    <img class="flere" src="<?php echo get_stylesheet_directory_uri();?>/assets/images/vase_sjov.jpg" alt="vase">
                </div>
            </a>
        </div>
        <a href="http://pernillestrate.dk/floweratelier/wordpress/interior/">
            <button class="knap_single">Shop mere til boligen</button>
        </a>
    </section>


</main>


<script>
    let produkter;
    let aktuelprodukt = <?php echo get_the_ID() ?>;

    const dbUrl = "http://pernillestrate.dk/floweratelier/wordpress/wp-json/wp/v2/produkter/" + aktuelprodukt;

    async function getJson() {
        const data = await fetch(dbUrl);
        produkter = await data.json();
        console.log(produkter);

        visProdukter();
    }


    function visProdukter() {
        console.log("visProdukter");
        console.log(produkter.title.rendered);
        document.querySelector(".billede_single").src = produkter.billede.guid;
        document.querySelector(".lang_beskrivelse_single").textContent = produkter.beskrivelse;
        document.querySelector(".pris_single").textContent = produkter.pris;
        document.querySelector(".title_single").textContent = produkter.title.rendered;
    }


    getJson();

</script>

<?php get_footer(); ?>
