const { createApp } = Vue;

createApp({
    data() {
        return {
            readUrl: 'read.php',
            createUrl: 'create.php',
            list: [],
            newTask: '',
            test: null
        };
    },
    created() {
        this.readTasks();
    },
    methods: {
        readTasks() {
            axios
                .get(this.readUrl)
                .then((response) => {
                    // console.log(response);
                    this.list = response.data.list;
                });
        },
        addTask() {
            console.log(this.newTask);

            const param = {
                taskName: this.newTask
            }

            axios.post(this.createUrl, param, {
                headers: { 'Content-Type': 'multipart/form-data' }
            }).then((response) => {
                this.newTask = '';
                this.readTasks();
            })
        }
    }
}).mount('#app');