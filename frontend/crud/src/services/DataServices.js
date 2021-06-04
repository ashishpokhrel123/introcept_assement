import http from '../Http/http-common';

class DataService {
    // for creating client
    createClient(data) {
        return http.post("/createClient", data);
    }

    // for getting client

    getClient() {
        return http.get("/getClient");
    }
}

export default  new DataService();