import React, { Component } from 'react';
import {render} from 'react-dom';

function MentionsPage(){

    return <div className='main-div-mentions'>


        <h1 className='main-title-mentions'>Les célèbres mentions légales</h1>

        <h2 className='subtitle-mentions'>Informatique et libertés</h2>


        <p className='paraph-protections-data'>Protection de vos données personnelles

Les mesures de confidentialité et de sécurité ont été mises en œuvre en interne, afin d’assurer la protection de vos données à caractère personnel.

Dans le cadre de votre navigation sur le site, le site de Lord of the ring peut être amenée à collecter des données à caractère personnel, vous concernant.</p>

<p className='paraph-explication-data'>Une donnée à caractère personnel désigne toute information concernant une personne physique identifiée ou identifiable (personne concernée) ; est réputée identifiable une personne qui peut être identifiée, directement ou indirectement, notamment par référence à un nom, un numéro d'identification ou à un ou plusieurs éléments spécifiques, propres à son identité physique, physiologique, génétique, psychique, économique, culturelle ou sociale.</p>

<p className='paraph-collect-data'>
Cette collecte de données peut se faire :

Dans le cadre de l’inscription au site internet,
Ces données seront conservées par le site pour une durée de 2 ans.
Le délai écoulé, les données personnelles seront supprimées du Système d’Information de la société.
Nous vous informons que vous bénéficiez d’un droit d’accès, de modification et de suppression des données vous concernant (article 38-40 de la Loi Informatique et Libertés).
Pour bénéficier de ce droit, il vous suffit d’en faire la demande auprès du Responsable du traitement.
Enfin, les données personnelles collectées ne feront l’objet d’aucune cession à des tiers non autorisés.</p>

<p className='paraph-prevention'>Le matériel de connexion au site que vous utilisez est sous votre entière responsabilité. Vous devez prendre toutes les mesures appropriées pour protéger votre matériel et vos propres données notamment d'attaques virales par Internet. Vous êtes par ailleurs seul responsable des sites et données que vous consultez.</p>

<p className='paraph-utilisation'>L'accès au site et son utilisation sont réservés à un usage strictement personnel. Vous vous engagez à ne pas utiliser ce site et les informations ou données qui y figurent à des fins commerciales, politiques, publicitaires et pour toute forme de sollicitation commerciale et notamment l'envoi de courriers électroniques non sollicités.</p>
    </div>
}


export default class MentionsLegales extends HTMLElement {
    connectedCallback(){
        render(<MentionsPage/>,this)
    }
}

customElements.define('mentions-page' , MentionsLegales)