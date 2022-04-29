import React, { Component, useState } from 'react';
import {render} from 'react-dom';


function Regles(){
    return(
        <div className='regles-container'>
            <div className='fond-1'>

            </div>

            <div className='history-container'>
                <div className='container-header'>
                    <h2> L'histoire commence ici.... </h2>
                    <br />
                    <br />
                    <div className='history-resume'>
                        <p> Nous sommes en l'an 2946 du Troisième Âge, et les terres à l'est des Monts Brumeux s'agitent. Des sommets couverts de nuages
                        au-dessus du High Pass vers l'obscurité infestée d'araignées de la forêt de Mirkwood, des sentiers longtemps déserts sont à nouveau parcourus.
                        Les marchands occupés transportent leurs marchandises vers de nouveaux marchés, les messagers apportent des nouvelles des royaumes étrangers et les rois envoient
                        des hommes armés pour étendre leur influence et l'état de droit. Certains disent qu'une nouvelle ère de liberté a commencé, un temps pour
                        aventure et de grandes actions pour reconquérir les gloires perdues au cours de longs siècles d'oppression et de déclin.
                        Mais les aventures ne sont pas vraiment des choses que les gens recherchent. Ils sont dangereux et finissent rarement bien. Alors qu'il
                        est vrai qu'une poignée d'individus vaillants se sont lancés dans le monde, pour d'autres il semble que l'aventure
                        les choisit, comme si c'était le chemin qu'ils devaient suivre. Ce sont des guerriers agités, des érudits curieux et des vagabonds,
                        toujours désireux de chercher ce qui a été perdu ou d'explorer ce qui a été oublié. Les gens ordinaires les appellent des aventuriers, et quand
                        ils reviennent avec succès, ils les appellent des héros. Mais s'ils échouent, personne ne se souviendra même de leurs noms...
                        Dans The One Ring Roleplaying Game, vous incarnez les héros de la Terre du Milieu. Vous parcourrez le pays, découvrirez ses
                        secrets, participez à son histoire et rencontrez ses habitants et ses légendes. Alors que l'Ombre revient à travers
                        les terres des Peuples Libres, vous découvrirez des indices de ce qui se passe et aurez la chance de jouer un rôle dans le
                        lutte contre l'Enem

                        </p>
                    </div>


                    <div className='history-place'>
                        <div className='left'>
                            <div className='img'>

                            </div>
                        </div>
                        <div className='right'>
                            <h2> One Ring ?</h2>
                            <br />
                            <br />
                            <br />
                            <p> One Ring est un jeu de rôle basé sur le
                                Hobbit et Le Seigneur des Anneaux, deux extraordinaires
                                œuvres de fiction de l'auteur bien-aimé et respecté
                                universitaire, John Ronald Reuel Tolkien. Avec ces livres,
                                Tolkien a présenté aux lecteurs sa propre plus grande création,
                                le monde de la Terre du Milieu. Une terre mythique vue de loin
                                passé, sa riche histoire et sa géographie détaillée ont été créées
                                au cours de nombreuses années.
                                Avec The One Ring, la Terre du Milieu est à vous d'explorer. Cette
                                guide vous fournit les règles du jeu et riche
                                des informations sur les personnes, les lieux et les adversaires que vous
                                pourriez rencontrer au cours de vos aventures
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    )
}

class regles extends HTMLElement {
    connectedCallback(){
        render(<Regles/>,this)
    }
}

export default Regles;

customElements.define('page-rules' , regles)