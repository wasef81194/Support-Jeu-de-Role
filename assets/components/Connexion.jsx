import React, { Component } from 'react';
import {render} from 'react-dom';

function ConnexionPage(){
    return <div className='main-div'>
       
    </div>
}

class Connexion extends HTMLElement {
    connectedCallback(){
        render(<ConnexionPage/>,this)
    }
}

customElements.define('connexion-page' , Connexion)