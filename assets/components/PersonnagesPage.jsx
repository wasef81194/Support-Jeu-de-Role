import React, { Component } from 'react';
import {render} from 'react-dom';

function PersonnagesPage(){

    const data = [
        {class: "Bardides", 
        "description": "Bard l’archer de la lignée de Giron, tueur de dragon est devenu Roi de Dale suivi par son peuple il fit reconstruire Dale et aidé par le Roi Dàin d’Erebor et par le Roi Thranduil du Royaume Sylvestre. Les habitants de Dale nommées les Bardides croissent et prospèrent et semblent fédérer le Royaume des Hommes du Nord.",
        "caractéristiques_1_title": "Le Marteau et l’Enclume",
        "caractéristiques_1_content": "Vos parents ont grassement payé le forgeron nain qui vous a pris en apprenti. Vous avez travaillé dur en vous conformant à sa discipline de fer pour prouver que votre art pouvait être conforme aux hautes exigences de son peuple. Au fil des longues heures passées à marteler l’enclume sous l’oeil attentif de votre maître, vous avez appris qu’il était possible de façonner des merveilles, mais aussi qu’un chef-d’oeuvre n’était envisageable que si vous y mettiez tout votre coeur.",
        "caractéristiques_2_title": "Au fil du verbe",
        "caractéristiques_2_content": "Le Roi Bard a gagné son trône en accomplissant un exploit que la plupart estimaient impensable, servant ainsi d’exemple aux générations à venir. Mais c’est une autre prouesse qui a retenu votre attention et enflammée votre imagination : celle d’un habile Semi-Homme qui n’a pas hésité à jouter verbalement contre Smaug le Doré, au coeur de son antre. Vous n’espérez pas rencontrer un vous-même un Dragon vivant, mais comptez bien exploiter votre ruse pour vous forger un nom.",
        "caractéristiques_3_title": "Sens acérés",
        "caractéristiques_3_content": "Vous avez grandi dans la Ville du Lac comme fils d’un marchand qui commerçait avec les Elfes remontant la rivière en radeau depuis les bois. Vous les avez souvent rejoint pour ramener avec eux, fier de votre force malgré votre jeune âge. Les affaires de votre famille peinaient dans l’ombre du Dragon et vous n’osiez pas vous aventurer très loin. Mais depuis la mort de Smaug, vous et vos frères avez commencé à vous rendre jusqu’à la forteresse sylvestre du Roi des Elfes. Après de nombreuses visites dans ses galeries magiques, vos yeux et vos oreilles semblent noter des détails qui échappaient autrefois à votre attention : un don des Belles Gens ?",
        "img":"https://cdn.discordapp.com/attachments/968448853160386591/968468276176879666/barde.png"}, 
        {class:"Beornides", 
        "description": "Beorn le changeur de peau, est un chef qui rassembla les chasseurs et les guerriers solitaires des Terres Sauvages. Ils contrôlent un domaine s’étendant de Carrock au Vieux Guet et jusqu’au Haut du Col. Les Beornides surveillent les routes et chemins et prélèvent des péages garantissant la sécurité des voyageurs.",
        "caractéristiques_1_title": "Racines doubles",
        "caractéristiques_1_content": "Il y a bien des années, votre père est descendu des montagnes pour prendre une femme des tribus de la Forêt Noire comme épouse. Vous avez grandi entre deux mondes, souvent perçu comme un étranger par ces deux peuples. Pendant des années, vous avez connu la méfiance et étiez la risée de tous pour la couleur de vos yeux et de vos cheveux. Mais vous ne vous en êtes pas laissé compter et avez conservé ce que votre coeur estimant bon dans les cultures respectives de votre mère et votre père.",
        "caractéristiques_2_title": "Messager",
        "caractéristiques_2_content": "Depuis que votre famille à rejoint Beorn et les siens, vous êtes par monts et par vaux à transmettre des messages et nouvelles pour votre nouveau peuple. Vos chaussures de peau ont parcouru les sentiers qui séparent le Haut Col de Vieux Gué à d’innombrables reprises et avez toujours été bien accueilli par les chefs et les familles, impatients de vous écouter. Il vous est arrivé d’apporter la joie et la liesse par des récits de victoire, mais aussi la détresse et l’inquiétude par vos annonces de guerre et de défaite.",
        "caractéristiques_3_title": "Chef de famille",
        "caractéristiques_3_content": "Beorn, le grand chef de votre peuple, a chargé votre père de surveiller les cols de montagne pendant l’essentiel de l’année, si bien que vous vous retrouvez responsable de votre famille. Chaque fois que le pistage d’un animal mène à l’ouest vers les montagnes, votre coeur s’emballe à l’idée du jour où votre père reviendra la besace pleine d’histoires et la peau marquée de nouvelles cicatrices pour en attester.",
        "img":"https://cdn.discordapp.com/attachments/968448853160386591/968479795174326322/Sans_titre-1.png"},
        {class:"Nains du Mont Solitaire", 
        "description": "Dàin Pied-d’acier est proclamé chef du peuple au décès de son parent Thorin Ecu-de-Chêne à la Bataille de 5 Armées. Sage et avisé, il distribua le trésor de Smaug à tous ceux qui en méritaient une part. Erebor prospère grâce à ses bonnes relation de voisinage et la Forteresse Souterraine devient la communauté la plus belle et la plus florissante des royaumes du Nord. Le Cœur de la Montagne appelé Arkenstone abrite la tombe de Thorin Ecu-de-Chêne.",
        "caractéristiques_1_title": "Une vie de labeur",
        "caractéristiques_1_content": "Avec votre famille, vous avez travaillé durement dans les mines des Monts du Fer en rêvant du jour où vous pourriez fouiller de nouveau des entrailles plus profondes, en quête de minerais plus précieux. Malheureusement, encore aujourd’hui, la plupart des anciennes forteresse nains ne sont que des antres de Dragon ou des fosses infestées d’Orques. En attendant, vous continuez à trimer avec patience en scrutant la pénombre avec des yeux avides à la recherche de lueurs dorées et étincelantes.",
        "caractéristiques_2_title": "Marchand ambulant",
        "caractéristiques_2_content": "Selon les critères nains, vous n’étiez encore qu’un adolescent lorsque vous avez quitté votre demeure des Montagnes Bleues pour suivre les vôtres sur les routes marchandes. Vous avez traversé bien des contrées et rencontré divers peuples prêts à échanger leurs marchandises contre des productions naines. Vous vous souvenez peu des routes empruntées car vous étiez guidé par vos parents plus chevronnés, mais ces voyages ont éveillés en vous le désir d’explorer le monde.",
        "caractéristiques_3_title": "Cruel exil",
        "caractéristiques_3_content": "Il y a bien longtemps, vos ancêtres ont été chassés de leurs demeures souterraines situées loin  dans le Nord. Depuis votre naissance, vous avez assisté votre père qui ne s’est jamais remis de cet exil forcé. Son mal s’est avéré contagieux, votre désir de retrouver le domaine perdu de vos aïeux vous ayant consumé lentement pendant des années. Vous avez tenté de noyer votre amertume dans l’oubli, mais les braises de votre colère ne sont jamais éteintes.",
        "img":"https://cdn.discordapp.com/attachments/968448853160386591/968474960865665075/Sans_titre-1.png"
        },
        {class:"Elfe de la Forêt Noire", 
        "description": "Thranduil, Roi des Elfes présent depuis le 2ème  ge a survécu à de multiples guerres et à appris à écouter son cœur. Il a choisi de construire son Palais sous terre à la lisière septentrionale de la Forêt Noire. Les Elfes Sylvains savent se cacher en surface et sont très discret. Le Palais de Thranduil est encore plus beau et plus gai que les palais des Nains. Les elfes sont aussi cruels avec leur ennemis que prévenant envers leurs amis.",
        "caractéristiques_1_title": "Un nouvel espoir",
        "caractéristiques_1_content": "Vous avez grandi parmi les Elfes bateliers et avez souvent eu affaire aux Hommes de la Ville du Lac au nom du Roi Thranduil. Au début, c’était seulement parce que votre Roi vous le demandait que vous sortiez de votre demeure forestière, mais ce n’est désormais plus une contrainte. Le monde qui s’étend au-delà de votre royaume est vaste et bien qu’il regorge de menaces cachées, il est également peuplé d’autres peuples valeureux, ennemis de la même Ombre que les vôtres affrontent depuis des siècles. Votre mission serait-elle de trouver des alliés digne de ce joindre à la lutte ?",
        "caractéristiques_2_title": "Un héritage musical",
        "caractéristiques_2_content": "Votre père était un ménestrel de grand talent dont l’oeuvre sera difficilement oubliée. Il vous a transmis son don, met cet amour pour la musique se retrouve dans votre seul discours. Vitre voix est un ravissement pour tous quand vous choisissez vos mets tels les doigts qui pincent les cordes de la harpe.",
        "caractéristiques_3_title": "Se souvenir du Mal",
        "caractéristiques_3_content": "Il y a bien longtemps, des Elfes parents de votre peuple vivaient autour de la Colline Nue au sud de Vert-Bois-Le-Grand, avant que le Nécromancien ne s’y installe pour y bâtir sa forteresse ensorcelée. Maintenant que l’Ombre s’est enfuie, vous vous y êtes souvent rendu pour épier ce site effroyable et repenser aux souffrances endurées par les vôtres pendant ces années de guerre. Beaucoup de vos frères préfèrent oublier et se réjouir, mais vous savez que le mal finit toujours par ressurgir.",
        "img":"https://cdn.discordapp.com/attachments/968448853160386591/968479457746763796/elfe.png"
        },
        {class:"Hobbits de la Comté", 
        "description": "Les Hobbits sont sédentaires et ne courent pas le danger. Ils préfèrent vivre dans leurs trous. Mais quelques-uns parmi les plus jeunes et les plus curieux passent la frontière de la Comté et tentent la Route de l’Est.",
        "caractéristiques_1_title": "Fermier impétueux",
        "caractéristiques_1_content": "Vous êtes né dans une famille de fermiers du Quartier Sud où pousse la meilleur herbe à pipe. Afin de satisfaire votre curiosité et les attentes de votre père, vous avez commencé à travailler très jeune et avez appris beaucoup auprès de négociants et agriculteurs. Il vous arrive de ressentir un lien profond avec la terre, qui vous pousse à dormir dans les champs, sous la voûte céleste.",
        "caractéristiques_2_title": "Trop de sentiers à fouler",
        "caractéristiques_2_content": "Votre père était marchand et vous étiez censé lui succéder dans sa boutique de Roccreux à l’âge de trente-trois ans. Pourtant, avant cela, une mystérieuse bougeotte s’est emparée de vous si bien que vous avez quitté votre demeure plusieurs mois. A votre retour, vous avez renoncé à votre position, provoquant l’indignation de tout le voisinage. Mais vous savez que votre père approuve en secret : il a toujours rêvé de quitter la Comté pour “aller voir les Elfes”",
        "caractéristiques_3_title": "Une oreille attentive",
        "caractéristiques_3_content": "Votre oncle était un Shiriff et vous l’avez souvent accompagné lorsqu’il allait “battre les limites”, autrement dit lorsqu’il devait surveiller les frontières de la Comté à l’affût d’étrangers. Il est arrivé plus d’une fois que sa ronde comprenne une visite au Buisson de Lierre, petite auberge de la route de Lèzeau. C’est là que, devant d’excellentes chopes de bières, vous avez entendu les meilleures histoires qui soient.",
        "img":"https://cdn.discordapp.com/attachments/968448853160386591/968480535447998565/Sans_titre-1.png"
        },
        {class:"Hommes des Bois des Terres Sauvages", 
        "description": "On nomme ainsi les hommes habitant dans la zone située au Sud du Gué jusqu’aux Champs d’Iris et jusqu’à  la lisière Sud-Ouest de la Forêt Noire. Ce sont des gens pugnaces, composés de Clans et de Grandes Familles. Ils ont même survécus à l’ombre de la Tour du Nécromancien. Leurs liens familiaux importent plus que tout et ils se réunissent pour toutes les grands évènements de la vie. Assistés par Radagast le Brun, dit l’« Ami des bêtes », les petits animaux de la forêt préviennent les habitants de tout danger. Il est courant chez les Hommes des Bois d’aller lui demander conseil jusqu’à sa demeure à Rhosgobel.",
        "caractéristiques_1_title": "Le limier",
        "caractéristiques_1_content": "Les chiens élevés par les habitants de Fort-Bois sont d’un brun grisonnant, fins de museau, émaciés et particulièrement grands avec leurs longues pattes. Depuis votre enfance, vous avez toujours été attiré par leur grâce naturelle et leur farouche loyauté mais, surtout, vous partagez leur passion de la chasse et vous éprouvez leur excitation lorsqu’ils fondent sur une proie.",
        "caractéristiques_2_title": "Disciple du Magicien",
        "caractéristiques_2_content": "Il y a bien des années, vous vous êtes amusés avec vos frères et soeurs à vous rappeler les histoires évoquées sur les tapisseries des murs de la grand-salle de Rhosgobel. Un jour, vous avez attiré l’attention du magicien Radagast et il vous a raconté comment les exploits de vos ancêtres avaient été transmis de génération en génération à travers de nombreuses chansons. Il vous a appris que le passé recélait des enseignements importants, de même que les actes de ceux qui vous ont précédé. ",
        "caractéristiques_3_title": "Héritage féérique",
        "caractéristiques_3_content": "On raconte que votre mère était aussi belle qu’une Elfe et que votre père l’aurait fait mystérieusement sortir du Bois de la Sorcellerie dans le sud lointain. Vous ne savez pas ce qu’il en est, même si vous avez de sérieux doutes puisqu’il n’y avait rien de magique dans l’amour qu’elle vous portait, à vous et votre père. Vous vous souvenez toutefois que ses sens étaient particulièrement acérés, une caractéristique dont vous avez hérité.",
        "img":"https://cdn.discordapp.com/attachments/968448853160386591/968479548742189107/Sans_titre-1.png"
        }]

    return <div className='main-div-personnages'>
       <div className='background-personnages'>
           
       </div>

        <div className='swipe-main-div'>
        <div className='div-navigation-slide-left'></div>
       <span className="swipe-div">Les classes</span>
       <div className='div-navigation-slide-right'></div>
        </div>
       
        {data.map((perso, index) => (
          <div key={index} className='card'>
              <img className="img-personnages" src={perso.img} />

              <div className='main-div-informations-personnages'>
              <h1 className='title-card'>{perso.class}</h1>
              <p className='paraph-card'>{perso.description}</p>

              <div className='carac-main-div'>
                  <div className='carac-div'>
                  <span className='span-carac title-carac'>{perso.caractéristiques_1_title}</span>
                  <span className='span-carac'>{perso.caractéristiques_1_content}</span>
                  </div>

                  <div className='carac-div'>
                  <span className='span-carac title-carac'>{perso.caractéristiques_2_title}</span>
                  <span className='span-carac'>{perso.caractéristiques_2_content}</span>
                  </div>

                  <div className='carac-div'>
                  <span className='span-carac title-carac'>{perso.caractéristiques_3_title}</span>
                  <span className='span-carac'>{perso.caractéristiques_3_content}</span>
                  </div>          
              </div>
              </div>
          </div>
        ))}
    </div>
}

function swipe(){
    console.log(1)
}
export default class Personnages extends HTMLElement {
    connectedCallback(){
        render(<PersonnagesPage/>,this)
    }
}

customElements.define('personnages-page' , Personnages)