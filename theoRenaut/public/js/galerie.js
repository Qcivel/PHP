
const script = "galerie.js";
const galerie = document.querySelector(".galerie");
const sidebar = document.querySelector(".sidebar");
const filtreContainer = document.getElementById("filtre-container");
const prevBtn = document.getElementById("prevBtn");
const nextBtn = document.getElementById("nextBtn");
let slides = document.getElementsByClassName("slide");

let slideIndex = 0;
let saveIndex  = 0 ;
console.log("test2");

//Envoie de la requete HTTP
async function recoverPicture(){

    //Création de l'entête de la requête

    const HEADER ={
        method : "GET", //Méthode HTTP utilisé
        mode: "cors", //Mode d'autorisation
    }

    const response = await fetch('http://localhost/theoRenaut/api/api_picture.php',HEADER);
    const data = await response.json();
    console.log(data);


    //Création des checkbox
    let seriesActives = [];
    let uniqueSeriesMap = {};
    let seriesForFilter; 

     //Création des photos
    data.forEach(picture=> {
        const div = document.createElement("div");
        const img = document.createElement("img");
        

        //Affichage des noms des séries
        uniqueSeriesMap[picture.id_series] = picture.title_series;

        //Affichage des photos
        galerie.appendChild(div);
        div.setAttribute("data-serie",picture.id_series);
        div.appendChild(img);
        div.classList.add("slide");
        img.setAttribute("src",picture.url_picture);
        
    });

    //Convertit l'objet en tableau
    seriesForFilter = Object.entries(uniqueSeriesMap);

    //Création des checkbox
    seriesForFilter.forEach(([seriesId, seriesTitle]) => {
        //Création des éléments
        const label = document.createElement("label");        
        const btn = document.createElement("button");

       //label
        filtreContainer.appendChild(label);
        
        

        //Définir les attributs
        btn.textContent = seriesTitle;
        btn.classList.add("filter-btn");
        filtreContainer.appendChild(btn);
        
        //Ecouteur d'événement sur les bouttons des séries
        btn.addEventListener("click",function(){
            const allFilterButtons = document.querySelectorAll(".filter-btn");
            allFilterButtons.forEach(button => button.classList.remove("active-filter"));
            
            //  Ajoute la classe active-filter au bouton cliqué
            this.classList.add("active-filter");
            seriesActives = [seriesId];
            
            slideIndex = 0;
            
            filterPictures();
            updateCarousel();
        });
    });
    filterPictures();
    updateCarousel();
    

    function filterPictures(){
        const allPictureContainers = document.querySelectorAll(".galerie div");
        allPictureContainers.forEach(picture=>{
            
            const seriePicture = picture.dataset.serie;
            if(seriesActives.includes(seriePicture) || (seriesActives.length===0) ){
                picture.classList.add("filterable");   // visible
            }else{
                picture.classList.remove("filterable");
                picture.classList.remove("active");
            }
        })
    }

}

    prevBtn.addEventListener("click", function(){
        console.log("Prev");
        slideIndex--;
        saveIndex=slideIndex;
        console.log(saveIndex);
        updateCarousel()
        
    });

    nextBtn.addEventListener("click", function(){
        console.log("Next");
        slideIndex++;
        saveIndex=slideIndex;
        console.log(saveIndex);
        updateCarousel();
        
    });

recoverPicture();

function updateCarousel(){
    const slideArray =  Array.from(slides);
    const visibleSlide = slideArray.filter(slide=>slide.classList.contains("filterable"));
    const counterDisplay = document.getElementById("counter");

    //Condition pour revenir a la fin du carrousel
    if(slideIndex < 0){
        slideIndex = visibleSlide.length - 1;
    }
    //Condition pour revenir au début du carrousel
    if(slideIndex > visibleSlide.length - 1 ){
        slideIndex = 0;
    }

    if(slideIndex >= visibleSlide.length && visibleSlide.length > 0){
        slideIndex = 0; // Revenir au début si l'index est trop grand
    }

    if (visibleSlide.length > 0 ){
        counterDisplay.textContent=`${slideIndex +1  } / ${visibleSlide.length}`;
    }else {
        counterDisplay.textContent="0/0";
    }

    slideArray.forEach(classActive=> {
        classActive.classList.remove("active");
    });

    if(visibleSlide.length > 0){
        visibleSlide[slideIndex].classList.add("active");
    }
}