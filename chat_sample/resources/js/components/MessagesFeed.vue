<template>
    <div class="feed" ref="feed">
        <ul v-if="contact">
            <li
                v-for="message in messages"
                :class="`message ${message.to == contact.id ? ' sent' : 'received'}`" 
                :key="message.id"
            >
                <div class="text">
                    {{ message.text }}
                </div>
            </li>
        </ul>
    </div>
</template>

<script>
export default {
    props: {
        contact: {
            type: Object,
        },
        messages: {
            type: Array,
            required: true, 
        }
    },
    methods: {
        scrollToBottom(){
            setTimeout( () => {
                this.$refs.feed.scrollTop = this.$refs.feed.scrollHeight - this.$refs.feed.clientHeight;
            }, 50);
        }
    },
    watch: {
        contact(contact) {
            this.scrollToBottom();
        },
        messages(messages) {
            this.scrollToBottom();
        }
    }
    
}
</script>

<style lang="scss" scoped>
.feed {
    background: rgb(165, 226, 252);
    height: 100%;
    max-height: 470px;
    overflow: scroll;

    ul {
        list-style-type: none;
        padding: 5px;

        li {
            &.message {
            margin: 10px 0;
            width: 100%;

                .text {
                    max-width: 200px;
                    border-radius: 5px;
                    padding: 12px;
                    display: inline-block;
                }

                &.received {
                    text-align: right;

                    .text {
                        background: rgb(248, 248, 248);
                    }
                }

                &.sent {
                    text-align: left;

                    .text {
                        background: rgb(92, 255, 105);
                    }
                }
            }
        }
    }
}
</style>