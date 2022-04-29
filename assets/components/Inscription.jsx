import React, { Component } from 'react';
import {render} from 'react-dom';

function InscriptionPage(){
    return <div className='main-div'>
       <form className="form-inscription">
           <p>Inscription</p>
           <input type="email" placeholder='email' />
           <input type="text" placeholder='pseudo' />
           <input type="text" placeholder='nom' />
           <input type="text" placeholder='prénom' />
           <input type="password" placeholder='mot de passe' />
           <input type="password" placeholder='retaper mot de passe' />
           <button>S'inscrire</button>
       </form>

       <div className="rotate">
            
       </div>
    </div>
}

class Inscription extends HTMLElement {
    connectedCallback(){
        render(<InscriptionPage/>,this)
    }
}

customElements.define('inscription-page' , Inscription)