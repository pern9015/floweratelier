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

    </div><!-- #primary -->

    <div>
        <section id="baggrund"><br></section>
        <section id="streg"><br></section>
        <h1 class="interior">Interiør</h1>
    </div>

    <main>
        <nav id="filtrering"></nav>


        <section id="liste" class="produktcontainer"></section>

    </main>

    <div>
        <?php astra_content_page_loop(); ?>
        <?php astra_primary_content_bottom(); ?>
    </div>

    <template>
        <article class="interior">
            <div class="img-hover-zoom">
                <img src="" class="billede" alt="">
            </div>
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
                if (cat.name == "Alle produkter") {
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
