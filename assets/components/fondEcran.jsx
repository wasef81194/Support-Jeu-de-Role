
import React, { Component, useState } from 'react';
import {render} from 'react-dom';
import { useEffect } from 'react/cjs/react.development';


function FondEcran(){
    

    return (
        <div className='background'>
            
        </div>
    )
}

class fondEcran extends HTMLElement {
    connectedCallback(){
        render(<FondEcran/>,this)
    
    }
}

customElements.define('fond-ecran' , fondEcran)