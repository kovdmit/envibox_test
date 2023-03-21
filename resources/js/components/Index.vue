<template>
    <div class="container">
        <div v-if="!sent" id="contact">
            <h3>Напишите нам</h3>
            <h4>Мы ответим Вам в ближайшее время.</h4>
            <div class="field">
                <input placeholder="Имя" v-model="name" type="text" required autofocus>
            </div>
            <div class="field">
                <input placeholder="Телефон" v-model="phone" type="tel" required>
            </div>
            <div class="field">
                <textarea placeholder="Ваше сообщение..." v-model="message" required></textarea>
            </div>
            <div class="field">
                <button :disabled="!isDisabled" @click.prevent="store()" name="submit" type="submit">Отправить</button>
            </div>
            <h4 v-if="error" class="danger">Пожалуйста, заполните все поля.</h4>
        </div>
        <div v-if="sent" id="contact">
            <h3>Спасибо за ваш отклик!</h3>
            <h4>Ваша заявка успешно обработана.</h4>
            <a href="/">Вернуться</a>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'Index',

        data() {
            return {
                name: null,
                phone: null,
                message: null,
                error: false,
                sent: false
            }
        },

        methods: {
            store() {
                axios.post('/api/send-message/', {
                    name: this.name,
                    phone: this.phone,
                    message: this.message
                }).then(res => {
                    this.sent = true
                }).catch(res => {
                    this.error = true
                })
            }
        },

        computed: {
            isDisabled() {
                return this.name && this.phone && this.message
            }
        }
    }
</script>
