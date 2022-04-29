/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
//import 'regenerator-runtime/runtime';
//import axios from 'axios';
import './styles/app.scss';

//import components React
import './components/Navbar.jsx';
import './components/Register.jsx';
import './components/Inscrition';
import './components/fondEcran.jsx'
import './components/Regles.jsx'
import './components/Connexion.jsx';
import './components/PersonnagesPage';
import './components/Footer.jsx';
import './components/MentionsPage';

// start the Stimulus application
import './controllers/formPersonnage.js' ;
import './controllers/profil.js' ;

//import function js
import './js/dynaForm';
