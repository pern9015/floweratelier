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
    <article class="interior" id="produkter">
        <section>
            <img src="" alt="" class="billede_single">
        </section>
        <section>
            <h1 class="title_single"></h1>
            <p class="pris_single"></p>
            <p class="lang_beskrivelse_single"></p>
            <button class="button_single">Tilføj til kurv</button>
        </section>
    </article>

    <!--
    <div class="baggrund">
        <h2 class="flere_produkter">Du vil måske også synes om:</h2>
        <section id="flereprodukter">
            <template>
                <article class="article_flereprodukter">
                    <img src="" alt="" class="billede_flereprodukter">
                    <div>
                        <h3 class="flereprodukter_title"></h3>
                        <p class="beskrivelse"></p>
                        <a href="">Læs mere</a>
                    </div>
                </article>
            </template>
        </section>
    </div>
-->
</main>


<script>
    let produkter;
    //    let flereprodukter;
    let aktuelprodukt = <?php echo get_the_ID() ?>;

    const dbUrl = "http://pernillestrate.dk/floweratelier/wordpress/wp-json/wp/v2/produkter/" + aktuelprodukt;

    //    const flereprodukterUrl = "http://pernillestrate.dk/radioLOUD/wordpress/wp-json/wp/v2/episoder?per_page=100";

    //    const container = document.querySelector("#flereprodukter");

    //    console.log("container: ", container);
    async function getJson() {
        const data = await fetch(dbUrl);
        produkter = await data.json();
        console.log(produkter);

        //        const data2 = await fetch(flereprodukterUrl);
        //        flereprodukter = await data2.json();
        //        console.log("flereprodukter: ", flereprodukter);

        visProdukter();
        //        visFlereprodukter();
    }


    function visProdukter() {
        console.log("visProdukter");
        console.log(produkter.title.rendered);
        document.querySelector(".billede_single").src = produkter.billede.guid;
        document.querySelector(".lang_beskrivelse_single").textContent = produkter.beskrivelse;
        document.querySelector(".pris_single").textContent = produkter.pris;
        document.querySelector(".title_single").textContent = produkter.title.rendered;
    }

    //    function visFlereprodukter() {
    //        console.log("visFlereprodukter");
    //        let temp = document.querySelector("template");
    //        flereprodukter.forEach(flereprodukter => {
    //                console.log("loop id :", aktuelprodukt);
    //                if (flereprodukter.horer_til_produkt == aktuelprodukt {
    //
    //                        console.log("loop kører id :", aktuelprodukt);
    //                        let klon = temp.cloneNode(true).content;
    //                        klon.querySelector("h3").textContent = flereprodukter.title.rendered;
    //                        klon.querySelector("img").src = flereprodukter.billede.guid;
    //                        console.log("flereprodukter.title.rendered: ", flereprodukter.title.rendered);
    //                        klon.querySelector(".beskrivelse").innerHTML = flereprodukter.content.rendered;
    //                        klon.querySelector("article").addEventListener("click", () => {
    //                            location.href = flereprodukter.link;
    //                        })
    //
    //                        klon.querySelector("a").href = flereprodukter.link;
    //                        console.log("episode", flereprodukter.link);
    //                        container.appendChild(klon);
    //                    }
    //
    //
    //                })
    //
    //        }
    getJson();

</script>

<?php get_footer(); ?>
