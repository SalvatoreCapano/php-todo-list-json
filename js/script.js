const { createApp } = Vue;

createApp({
    data() {
        return {
            apiUrl: './api.php',
            list: [],
        };
    },
    created() {
        axios
            .get(this.apiUrl)
            .then((response) => {
                console.log(response);
                this.list = response.data.list;
            });
    }
}).mount('#app');