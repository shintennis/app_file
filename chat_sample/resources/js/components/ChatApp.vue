<template>
    <div class="chat-app">
        <Conversation :contact="selectContact" :messages="messages" @new="saveNewMessage"/>
        <ContactsList :contacts="contacts" @selected="startConversationWith"/>
    </div>
</template>

<script>
    import Conversation from './Conversation';
    import ContactsList from './ContactsList';
    import axios from 'axios';

    export default {
        props: {
            user: {
                type: Object,
                required: true
            }
        },
        data(){
            return {
                selectContact: null,
                messages: [],
                contacts: []
            };
        },
        mounted() {
            Echo.private(`messages${this.user.id}`)
                .listen('NewMessage', (e) => {
                    this.hanleIncoming(e.message);
                })
            axios.get('/contacts')
            .then((response) => {
                this.contacts = response.data;
            })
        },
        methods: {
            startConversationWith(contact){
                axios.get(`/conversation/${contact.id}`)
                .then( (response) => {
                    console.log(response.data);
                    this.messages = response.data;
                    this.selectContact = contact;
                })
                .catch( (error) => {
                    console.log(error.data);
                })
            },
            saveNewMessage(text){
                this.messages.push(text);
            },
            hanleIncoming(message){
                if(this.selectContact && message.from == this.selectContact.id){
                    this.saveNewMessage(message);
                    return;
                }

                alert(message.text);
            }
        },
        components: {
            Conversation,
            ContactsList,
            axios
        }
    }
</script>


<style scoped>
.chat-app {
    display: flex;
}
</style>