/* eslint-disable no-undef */
import axios from 'axios';
// import { useErrorStore } from '../../store/error';
// import Auth from '../auth';

export default class Api {
  constructor() {
    this.api_url = "http://localhost:8000/api/";
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
      .get(`part`)
      .catch((error) => {
        // this.addError(error.message);
      });
  };

  getSegment = () => {
    return this.init()
      .get(`segment`)
      .catch((error) => {
        // this.addError(error.message);
      });
  };

  getCategory = () => {
    return this.init()
      .get(`category`)
      .catch((error) => {
        // this.addError(error.message);
      });
  };


  getBrand = () => {
    return this.init()
      .get(`brand`)
      .catch((error) => {
        // this.addError(error.message);
      });
  };


  getStock = () => {
    return this.init()
      .get(`stock`)
      .catch((error) => {
        // this.addError(error.message);
      });
  };


  getWarehouse = () => {
    return this.init()
      .get(`warehouse`)
      .catch((error) => {
        // this.addError(error.message);
      });
  };


  getBuild = () => {
    return this.init()
      .get(`build`)
      .catch((error) => {
        // this.addError(error.message);
      });
  };


  getStock = () => {
    return this.init()
      .get(`stock`)
      .catch((error) => {
        // this.addError(error.message);
      });
  };


  getCategoryById = (id) => {
    return this.init()
      .get(`part?category_id=`+id)
      .catch((error) => {
        // this.addError(error.message);
      });
  };


  getUser = () => {
    return this.init()
      .get(`user`)
      .catch((error) => {
        // this.addError(error.message);
      });
  };



  getStockByGRF = (code) => {
    return this.init()
      .get(`/grf/stock/list/`+code)
      .catch((error) => {
        // this.addError(error.message);
      });
  };

  // http://localhost:8000/api001~hajidalakhtar~ib~ix~2022
  getWarehouseApproved = () => {
    return this.init()
      .get(`grf/warehouse`)
      .catch((error) => {
        // this.addError(error.message);
      });
  };


  


/*
*|--------------------------------------------------------------------------
*| Api for select
*|--------------------------------------------------------------------------
*/
  getCategorySelect = (id) => {
    return this.init()
      .get(`category/select`)
      .catch((error) => {
      });
  };

  getBrandSelect = (id) => {
    return this.init()
      .get(`brand/select`)
      .catch((error) => {
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
