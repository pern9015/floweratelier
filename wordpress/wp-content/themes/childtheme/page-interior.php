<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Astra
 * @since 1.0.0
 */

get_header(); ?>

<div<?php astra_primary_class(); ?>>

    <?php astra_primary_content_top(); ?>

    <?php astra_content_page_loop(); ?>

    <?php astra_primary_content_bottom(); ?>

    </div><!-- #primary -->

    <head>
        <meta name="description" content="Dette er et redesign af Flower Ateliers hjemmeside">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@900&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/custom.css">
    </head>
    <main>
        <nav id="filtrering"></nav>


        <section id="liste" class="produktcontainer"></section>

    </main>
    <template>
        <article class="interior">
            <img src="" class="billede" alt="">
            <h3 class="titel"></h3>
            <p class="pris"></p>
        </article>
    </template>

    <script>
        let produkter;
        let categories;
        let filterProdukter = "alle";
        const dbUrl = "http://pernillestrate.dk/floweratelier/wordpress/wp-json/wp/v2/produkter?per_page=100";
        const catUrl = "http://pernillestrate.dk/floweratelier/wordpress/wp-json/wp/v2/categories";

        async function getJson() {
            const data = await fetch(dbUrl);
            const catdata = await fetch(catUrl);
            produkter = await data.json();
            categories = await catdata.json();
            console.log(produkter);
            console.log(categories);
            visProdukter();
            opretKnapper();
        }

        function opretKnapper() {

            categories.forEach(cat => {
                if (cat.name == "Alle") {
                    document.querySelector("#filtrering").innerHTML += `<button class="filter active" data-produkter="${cat.id}">${cat.name}</button>`
                } else {
                    document.querySelector("#filtrering").innerHTML += `<button class="filter" data-produkter="${cat.id}">${cat.name}</button>`
                }
            })

            addEventListenersToButtons();
        }

        function addEventListenersToButtons() {
            document.querySelectorAll("#filtrering button").forEach(elm => {
                elm.addEventListener("click", filtrering);
            })
        };

        function filtrering() {
            document.querySelectorAll("#filtrering button").forEach(elm => {
                elm.classList.remove("active")
            });
            filterProdukter = this.dataset.produkter;
            console.log(filterProdukter);

            visProdukter();

            //            header.textContent = this.textContent;


            this.classList.add("active");


        }


        function visProdukter() {
            let temp = document.querySelector("template");
            let container = document.querySelector(".produktcontainer")
            container.innerHTML = "";
            produkter.forEach(produkter => {
                if (filterProdukter == "alle" || produkter.categories.includes(parseInt(filterProdukter))) {
                    let klon = temp.cloneNode(true).content;
                    klon.querySelector("h3").textContent = produkter.title.rendered;
                    klon.querySelector(".billede").src = produkter.billede.guid;
                    klon.querySelector(".pris").textContent = produkter.pris;
                    klon.querySelector("article").addEventListener("click", () => {
                        location.href = produkter.link;
                    })
                    container.appendChild(klon);
                }
            })

        }

        getJson();

    </script>

    <?php get_footer(); ?>
