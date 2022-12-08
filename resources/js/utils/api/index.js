/* eslint-disable no-undef */
import axios from "axios";
// import { useErrorStore } from '../../store/error';
// import Auth from '../auth';

export default class Api {
    constructor() {
        this.api_url = "http://localhost:8000/api/";
        // this.addError = useErrorStore((state) => state.addError);
    }

    init = () => {
        let headers = {
            Accept: "application/json",
            "Content-Type": "application/x-www-form-urlencoded",
        };
        // if (this.api_token) {
      headers.Authorization = `Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYXBpL2xvZ2luIiwiaWF0IjoxNjY5ODY0MjAwLCJuYmYiOjE2Njk4NjQyMDAsImp0aSI6InVidENhaFJueUhtb3lIZEIiLCJzdWIiOiI2IiwicHJ2IjoiMjNiZDVjODk0OWY2MDBhZGIzOWU3MDFjNDAwODcyZGI3YTU5NzZmNyJ9.1dyeHroTDrK3Z-R4rObKZtJZDC0Lirz0p9w4OqxQgLk`;
        // }
        // console.log(headers);
        this.client = axios.create({
            baseURL: this.api_url,
            timeout: 31000,
            headers: headers,
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
            .get(`part?category_id=` + id)
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

    getVendor = () => {
        return this.init()
            .get(`vendor`)
            .catch((error) => {
                // this.addError(error.message);
            });
    };

    getWarehouseRequest = (wh_id) => {
        // console.log(wh_id);
        return this.init()
            .get(`warehouse/all/request/` + wh_id)
            .catch((error) => {
                // this.addError(error.message);
            });
    };

    getWarehouseReturn = (wh_id) => {
        return this.init()
            .get(`warehouse/all/return/` + wh_id)
            .catch((error) => {
                // this.addError(error.message);
            });
    };

    getStockByGRF = (code) => {
        return this.init()
            .get(`/grf/stock/list/` + code)
            .catch((error) => {
                // this.addError(error.message);
            });
    };

    getOutboundGRF = () => {
        return this.init()
            .get(`grf/all/outbound`)
            .catch((error) => {
                // this.addError(error.message);
            });
    };

    getReturnStockGRF = () => {
        return this.init()
            .get(`grf/return-stock`)
            .catch((error) => {
                // this.addError(error.message);
            });
    };

    getRequestFormByGRF = (code) => {
        return this.init()
            .get(`grf/request/list/` + code)
            .catch((error) => {});
    };

    // brand
    // http://localhost:8000/api001~hajidalakhtar~ib~ix~2022
    getWarehouseApproved = () => {
        return this.init()
            .get(`grf/warehouse`)
            .catch((error) => {
                // this.addError(error.message);
            });
    };

    postTransactionApprovedIC = (grf_id, part_id, brand_id, qty) => {
        return axios
            .post("http://localhost:8000/transaction/approve/IC", {
                id: grf_id,
                brand: brand_id.toString(),
                part: part_id.toString(),
                quantity: qty.toString(),
            })
            .catch(function (error) {
                console.log(error);
            });
    };

    postAddPart = (
        name,
        category_id,
        segment_id,
        brand_id,
        uom,
        sn,
        color,
        size,
        description,
        note
    ) => {
        return axios
            .post("http://localhost:8000/part", {
                name: name,
                category_id: parseInt(category_id),
                segment_id: parseInt(segment_id),
                brand_id: parseInt(brand_id),
                uom: uom,
                sn_status: sn,
                color: color,
                size: size,
                description: description,
                note: note
            })
            .catch(function (error) {
                console.error(error);
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
            .catch((error) => {});
    };

    getBrandSelect = (id) => {
        return this.init()
            .get(`brand/select`)
            .catch((error) => {});
    };

    getSegmentByCategorySelect = (id) => {
        return this.init()
            .get(`segment/category/` + id)
            .catch((error) => {});
    };

    getBrandBySegmentSelect = (id) => {
        return this.init()
            .get(`brand/segement/` + id)
            .catch((error) => {});
    };

    getWarehouseTransferApprov = (id) => {
        return this.init()
            .get(`warehouse/all/detail/transfer/` + id)
            .catch((error) => {});
    };

    getWarehouseRecipient = (id) => {
        return this.init()
            .get(`warehouse/all/detail/recipient/` + id)
            .catch((error) => {});
    };

    getWarehouseListTransfer = (id) => {
        return this.init()
            .get(`warehouse/all/warehouse/transfer/` + id)
            .catch((error) => {});
    };

    getWarehouseListRecipient = (id) => {
        return this.init()
            .get(`warehouse/all/warehouse/recipient/` + id)
            .catch((error) => {});
    };

    getInboundGiverIndex = (id) => {
        return this.init()
            .get(`inbound/giver/` + id)
            .catch((error) => {});
    };

    getInboundGiverShow = (id) => {
        return this.init()
            .get(`inbound/giver/show/` + id)
            .catch((error) => {});
    };

    getInboundRecipientIndex = (id) => {
        return this.init()
            .get(`inbound/recipient/` + id)
            .catch((error) => {});
    };

    getInboundRecipientShow = (id) => {
        return this.init()
            .get(`inbound/recipient/show/` + id)
            .catch((error) => {});
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
