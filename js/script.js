const { createApp } = Vue;

createApp({
    data() {
        return {
            createUrl: 'create.php',
            readUrl: 'read.php',
            updateUrl: 'update.php',
            deleteUrl: 'delete.php',
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
        createTask() {
            console.log(this.newTask);

            const param = {
                newTask: this.newTask
            }

            axios.post(this.createUrl, param, {
                headers: { 'Content-Type': 'multipart/form-data' }
            }).then((response) => {
                this.newTask = '';
                this.readTasks();
            })
        },
        updateTask(index) {
            const param = {
                index: index
            }

            axios.post(this.updateUrl, param, {
                headers: { 'Content-Type': 'multipart/form-data' }
            }).then((response) => {
                this.readTasks();
            })
        }
        ,
        deleteTask(index) {
            const param = {
                index: index
            }

            axios.post(this.deleteUrl, param, {
                headers: { 'Content-Type': 'multipart/form-data' }
            }).then((response) => {
                this.readTasks();
            })
        }
    }
}).mount('#app');