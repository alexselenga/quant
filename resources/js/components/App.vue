<template>
    <div class="container">
        <div class="row my-4">
            <h1 class="offset-sm-3">Заполните заявку</h1>
        </div>
        <div>
            <div class="row mb-3">
                <div class="col-sm-3 offset-sm-3">
                    <label for="name" class="form-label">Имя</label>
                    <input type="text" class="form-control" id="name" placeholder="Имя" v-model="message.name">
                </div>
                <div class="col-sm-3">
                    <label for="phone" class="form-label">Телефон</label>
                    <input type="text" class="form-control" id="phone" placeholder="Телефон" v-model="message.phone">
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-sm-6 offset-sm-3">
                    <label for="text" class="form-label">Обращение</label>
                    <textarea class="form-control" id="text" rows="5" v-model="message.text"></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-1 offset-sm-3">
                    <button class="btn btn-primary mb-3" @click="store">Отправить</button>
                </div>
                <div class="col-sm-5 ms-3">
                    <div class="error" v-if="errors.length" v-html="errors"></div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "App",
    data: () => ({
        message: {
            name: '',
            phone: '',
            text: '',
        },
        errors: []
    }),
    methods: {
        async store() {
            const res = await fetch('api/messages', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json;charset=utf-8',
                },
                body: JSON.stringify(this.message),
            });

            const data = await res.json();

            if (res.status === 422) {
                this.errors = Object.values(data).map(item => item.join('<br>')).join('<br>');
            } else {
                this.message.name = '';
                this.message.phone = '';
                this.message.text = '';

                this.errors = '';
            }
        },
    }
}
</script>
<style>
    .error {
        color: red;
    }
</style>
