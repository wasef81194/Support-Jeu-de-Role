import React, { Component } from 'react';
import {render} from 'react-dom';

function InscriptionPage(){
    return <div className='register-main-div'>
       <form className='form-inscription'>
           <p>Inscription</p>
           <input type="email" placeholder='email' />
           <input type="text" placeholder='pseudo' />
           <input type="text" placeholder='Nom' />
           <input type="text" placeholder='Prénom' />
           <input type="password" placeholder='Mot de passe' />
           <input type="password" placeholder='Retaper Mot de passe' />
           <button>S'inscrire</button>
       </form>

       <div id="try" className='circle-lord'>
               
           </div>
    </div>
}

class Inscription extends HTMLElement {
    connectedCallback(){
        render(<InscriptionPage/>,this)
    }
}

customElements.define('inscription-page' , Inscription)