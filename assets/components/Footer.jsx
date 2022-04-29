import React from 'react';
import {render} from 'react-dom';

function FooterNavigation(){

    return <div className='base-footer'>
           
           <div className='jhow-presentation'>
                <p>Jhow Project</p>
                <span>Projet réalisé lors de la Licence Développement Web et Application Mobile 2022</span>
           </div>

           <div className='div-informations'>
               <p>Informations complémentaires</p>

               <div className='informations-content'>
                <span><a>A propos</a></span>
                <span><a href='http://localhost:8000/mentions'>Mentions légales</a></span>
            </div>
           </div>
           <div className='city-project-div'>
        <span>Université de Cergy-Pontoise</span>
                <span>Site de Gennevilliers</span>
                <span>92230 GENNEVILLIERS</span>
        </div>
    </div>
}

class Footer extends HTMLElement {
    connectedCallback(){
        render(<FooterNavigation/>,this)
    }
}

customElements.define('footer-navigation' , Footer)