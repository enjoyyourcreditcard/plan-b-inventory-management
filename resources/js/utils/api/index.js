/* eslint-disable no-undef */
import axios from 'axios';
// import { useErrorStore } from '../../store/error';
// import Auth from '../auth';

export default class Api {
  constructor() {
    this.api_url = "http://localhost:8000/data/demo/";
    // this.addError = useErrorStore((state) => state.addError);
  }

  init = () => {
    let headers = {
      Accept: 'application/json',
      'Content-Type': 'application/x-www-form-urlencoded'
    };
    // if (this.api_token) {
    //   headers.Authorization = `Bearer ${this.api_token}`;
    // }
    // console.log(headers);
    this.client = axios.create({
      baseURL: this.api_url,
      timeout: 31000,
      headers: headers
    });

    return this.client;
  };
  getPart = () => {
    return this.init()
      .get(`part.json`)
      .catch((error) => {
        // this.addError(error.message);
      });
  };

  // getTrandingList = () => {
  //   return this.init()
  //     .get(`/get/news/tranding`)
  //     .catch((error) => {
  //       this.addError(error.message);
  //     });
  // };

  // getBookmark = () => {
  //   return this.init()
  //     .get(`/bookmark/62bf0eca9dc4bab5a5a28e7b`)
  //     .catch((error) => {
  //       this.addError(error.message);
  //     });
  // };

  // postAddVote = (params) => {
  //   return this.init()
  //     .post(`/vote/news`, params)
  //     .catch((error) => {
  //       console.log(params);
  //       console.log(error.message);
  //       this.addError(error.message);
  //     });
  // };

  //   addNewUser = (data) => {
  //     return this.init().post('/users', data);
  //   };
}