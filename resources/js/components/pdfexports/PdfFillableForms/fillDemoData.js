/*
Function data
 */

export function fillDemoData(demoData, form){

       for(let i = 1; i < Object.keys(demoData).length; i++){
         form[i] =demoData[i];
       }

};


/*
Prefill Form Data
 */
export const demoDataForm_1099 = {
    1: '100.12',
    2: '3.21',
    3: '34556.67',
    4: '1234.56',
    5: '',
    6: '1323.34',
    7:  true,
    8: '12.56',
    9: '34.12',
    10: '34.12',
    11: '',
    12: '332.12',
    13: '123.21',
    14: '45.67',
    15: '3456.23',
    16: 'C1233',
    17: '34456.78',
    18: '8056 E Tufts. Ave\n' +
        'Denver, CO, 80237\n' +
        '303-334-9999',
    19: '12-4575544',
    20: '524-55-4141',
    21: 'Hogwarts School of Witchcraft and Wizardry U.S.',
    22: '89 E 42nd St',
    23: 'New York, NY 10017',
    24: '1008565',
    25: ''
};


export const demoDataForm_1098 = {
    1: '8001.20',
    2: '47586.12',
    3: '01/02/2018',
    4: '1234.56',
    5: '3323.34',
    6: '1323.34',
    7:  true,
    8: '8056 E Tufts. Ave\n' +
        'Denver, CO, 80237\n' +
        '303-334-9999',
    9: '1',
    10: '34.12',
    11: '12/31/2017',
    12: '8056 E Tufts. Ave\n' +
        'Denver, CO, 80237\n' +
        '303-334-9999',
    13: '74-1742036',
    14: '152-85-1234',
    15: 'Albert Einstein',
    16: '1300 Morris Park Ave',
    17: 'The Bronx, NY 10461',
    18: '4-85411596'
};
