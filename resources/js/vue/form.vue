<script>
import axios from 'axios';

export default {
    data() {
        return {
            login: '',
            password: '',
            error: false
        }
    },
    methods: {
        Log_In: function () {
            this.error = false;
            let post = { login: this.login, password: this.password };
            axios.post('/auth/in',post).then(res => {
                if(res.data.chek_user)
                {
                    location.reload();
                }
                else
                {
                    this.error = true;
                }
            });
        }
    }
}

</script>

<template>
    <div class="auth_box">
        <h2 class="auth_title">Авторизация</h2>
        <input autocomplete="off" v-model="login" name="login" class="univ_inp" type="text" placeholder="Логин">
        <input autocomplete="off" v-model="password" name="password" class="univ_inp" type="password" placeholder="Пароль">
        <button @click="Log_In()" v-show="login != '' && password != ''" class="univ_button">
            Авторизоваться
        </button>
        <div v-show="error" class="error">Не правильно ввели логин или пароль</div>
    </div>
</template>
