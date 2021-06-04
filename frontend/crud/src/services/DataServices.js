import http from '../Http/http-common';

class DataService {
    // for storing client to csv file
    createClient(data) {
        return http.post("/createClient", data);
    }

    // fetching  All client from csv file

    getClient() {
        return http.get("/getClient");
    }

    // fetching particular client from csv file

    getClientDetail(id) {
        return http.get(`/getClient/${id}`)
    }
}

export default  new DataService();