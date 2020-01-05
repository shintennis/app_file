<template>
    <div class="contacts-list">
        <ul>
            <li 
                v-for="(contact ,index) in contacts" 
                :key="contact.id" 
                @click="selectContact( index, contact )"
                :class="{ 'selected' : index == selected }">
                <div class="contact">
                    <p class="name">{{ contact.name }}</p>
                    <p class="email">{{ contact.email }}</p>
                </div>
            </li>
        </ul>
    </div>
</template>

<script>
export default {
    props: {
        contacts: {
            type: Array,
            default: []
        }
    },
    data(){
        return {
            selected: 0
        };
    },
    methods: {
        selectContact(index, contact){
            this.selected = index
            this.$emit('selected', contact);
        }
    }
}
</script>

<style lang="scss" scoped>
.contacts-list {
    flex: 2;
    max-height: 600px;
    overflow: scroll;
    border-left: 1px solid rgb(59, 59, 59);
}
ul {
    list-style-type: none;
    padding: 0;

    li {
        display: flex;
        padding: 2px;
        border-bottom: 1px solid rgb(218, 218, 218);
        height: 80px;
        position: relative;
        cursor: pointer;

        &:hover {
            background-color: rgb(221, 221, 221);
        }
        &.selected {
            background-color: lightgray;
        }
    }
}
.contact {
    flex: 3;
    font-size: 10px;
    overflow: hidden;
    display: flex;
    padding: 2em;
    flex-direction: column;
    justify-content: center;

    p {
        margin: 0;

        &:hover {
        font-size: bold;
        }
    }
}


</style>