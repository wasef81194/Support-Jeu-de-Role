import React, { Component } from 'react';
import {render} from 'react-dom';

function RegisterPage(){
    return <div className='register-main-div'>
       <form>
           <input type="email" />
           <input type="password" />
           <button>Se connecter</button>
       </form>
    </div>
}

export default class Register extends HTMLElement {
    connectedCallback(){
        render(<RegisterPage/>,this)
    }
}

customElements.define('register-page' , Register)