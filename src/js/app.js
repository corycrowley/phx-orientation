import Vue from 'vue'
import Axios from 'axios'

let eventsApiURL = 'https://phxuniversity.wpengine.com/wp-json/wp/v2/events/?_embed&per_page=6'

new Vue( {
    el: '#app',

    data: {
        eventLocation: '12', // University
        eventCategory: '5,6', // Only Orientation, Student Ambassadors Category
        eventsCount: '',
        events: {}
    },

    created() {
        this.fetchEvents()
    },

    filters: {
        encode: function(v) {
            return v;
        }
    },

    computed: {
        hasEvents() {
            return this.events.length
        }
    },

    methods: {
        fetchEvents() {
            if ( this.eventLocation ) {
                eventsApiURL += `&event-location=${this.eventLocation}`
            }

            if ( this.eventCategory ) {
                eventsApiURL += `&event-category=${this.eventCategory}`
            }

            Axios.get( eventsApiURL ).then( ( { data } ) => {
                let eventsData = data

                for ( let i = 0; i < eventsData.length; i++ ) {
                    let locations = eventsData[i]._embedded['wp:term'][0]
                    let categories = eventsData[i]._embedded['wp:term'][1]

                    if ( locations[0] ) {
                        eventsData[i].location = locations[0].name;
                    }

                    if ( categories[0] ) {
                        eventsData[i].category = categories[0].name;
                    }
                }

                this.events = eventsData
                this.eventsCount = this.events.length
            } )
        }
    }
} )