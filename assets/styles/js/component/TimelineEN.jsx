import React, {useEffect, useRef, useCallback} from "react";
import {render, unmountComponentAtNode} from 'react-dom';
import { VerticalTimeline, VerticalTimelineElement }  from 'react-vertical-timeline-component';
import 'react-vertical-timeline-component/style.min.css';

/**
 * Inject in HTML in Callback
 */
class TimelineElement extends HTMLElement {

    connectedCallback () {

        render(<TimeLine/>, this)
    }

    disconnectedCallback () {
        unmountComponentAtNode(this);
    }
}

class WorkIcon extends React.Component {
    render() {
        return <i className="fas fa-briefcase"/>;
    }
}

class SchoolIcon extends React.Component {
    render() {
        return <i className="fas fa-graduation-cap"/>;
    }
}

class StartIcon extends React.Component {
    render() {
        return <i className="fas fa-map-marker"/>;
    }
}

/**
 * Result for front site
 */
function TimeLine () {

    return <div>
        <VerticalTimeline>
            <VerticalTimelineElement
                className="vertical-timeline-element--work blue-title"
                date="2020 - today"
                iconStyle={{background: '#28B7E3', color: '#fff'}}
                icon={<WorkIcon/>}
            >
                <h3 className="vertical-timeline-element-title timeline-text">PHP/Symfony Web Developer</h3>
                <h4 className="timeline-subtitle timeline-text">Negocian.cloud, Mérignac</h4>
                <p className="timeline-text">
                    HTML/CSS, SASS, PHP/Symfony, Javascript/Jquery, Git, BitBucket, WSL, ...
                </p>
            </VerticalTimelineElement>
            <VerticalTimelineElement
                className="vertical-timeline-element--work blue-title"
                date="2019 - 2020"
                iconStyle={{background: '#F4D03F', color: '#FFF'}}
                icon={<SchoolIcon/>}
            >
                <h3 className="vertical-timeline-element-title timeline-text">Formation Développeur Web</h3>
                <h4 className="vertical-timeline-element-subtitle timeline-subtitle timeline-text">Wild Code School Bordeaux</h4>
                <p className="timeline-text">
                    HTML/CSS, SASS, PHP/Symfony, Git, Linux, Projets de formations, Hackathons
                </p>
            </VerticalTimelineElement>
            <VerticalTimelineElement
                className="vertical-timeline-element--work blue-title"
                date="2012 - 2019"
                iconStyle={{background: '#28B7E3', color: '#fff'}}
                icon={<WorkIcon/>}
            >
                <h3 className="vertical-timeline-element-title timeline-text">Assistant Spécialisé Vétérinaire</h3>
                <h4 className="vertical-timeline-element-subtitle timeline-text">Clinique Vétérinaire Alliance, Bordeaux</h4>
                <p className="timeline-text">
                    Gestion des anesthésies, Aide en chirurgie, Préparation des blocs, Soins aux hospitalisés, ...
                </p>
            </VerticalTimelineElement>
            <VerticalTimelineElement
                className="vertical-timeline-element--education blue-title"
                date="2015 - 2018"
                iconStyle={{background: '#F4D03F', color: '#FFF'}}
                icon={<WorkIcon/>}
            >
                <h3 className="vertical-timeline-element-title timeline-text">Membre du Jury et formateur, ASV</h3>
                <h4 className="vertical-timeline-element-subtitle timeline-text">GIPSA et Sup Veto, Bordeaux</h4>
                <p className="timeline-text">
                    Formation et évaluation des candidats pour le passage du titre: Auxiliaire Spécialisé Vétérinaire
                </p>
            </VerticalTimelineElement>
            <VerticalTimelineElement
                className="vertical-timeline-element--work blue-title"
                date="2010 - 2012"
                iconStyle={{background: '#28B7E3', color: '#fff'}}
                icon={<WorkIcon/>}
            >
                <h3 className="vertical-timeline-element-title timeline-text">Assistant Spécialisé Vétérinaire</h3>
                <h4 className="vertical-timeline-element-subtitle timeline-text">Centres Hospitaliers Vétérinaire, FRANCE</h4>
                <p className="timeline-text">
                    Gestion des anesthésies, Aide en chirurgie, Préparation des blocs, Soins aux hospitalisés, ...
                </p>
            </VerticalTimelineElement>
            <VerticalTimelineElement
                className="vertical-timeline-element--education blue-title"
                date="2010"
                iconStyle={{background: '#F4D03F', color: '#FFF'}}
                icon={<SchoolIcon/>}
            >
                <h3 className="vertical-timeline-element-title timeline-text">Auxiliaire Spécialisé Vétérinaire</h3>
                <h4 className="vertical-timeline-element-subtitle timeline-text">Laval</h4>
                <p className="timeline-text">
                    Formation pour l'obtention du titre : Auxiliaire Spécilaisé Vétérinaire.
                </p>
            </VerticalTimelineElement>
        </VerticalTimeline>
    </div>;
}

customElements.define('timeline-en-zone', TimelineElement);