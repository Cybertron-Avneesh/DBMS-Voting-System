USE votingdb;


INSERT INTO admincontrol(password, display_result)
VALUES('password', 1);


INSERT INTO elections(
        eid,
        title,
        starttime,
        endtime,
        descriptionelection
    )
VALUES(
        1,
        'President',
        '2021-04-20 10:00:00',
        '2021-05-03 17:00:00',
        'Only 3rd year students can apply for the post of Gymkhana President.'
    ),
    (
        2,
        'Mess President',
        '2021-04-20 10:00:00',
        '2021-05-03 17:00:00',
        'Only 3rd year students can apply for the post of Mess comittee President.'
    ),
    (
        4,
        'Testing Election',
        '2021-04-20 10:00:00',
        '2021-05-03 10:00:00',
        'This is the description of updating a new election'
    );


INSERT INTO users(
        enrollid,
        name,
        birthdate,
        mobile,
        email,
        course,
        batchyear,
        gender,
        cgpa,
        password
    )
VALUES(
        'IIB2019001',
        'Harsh Mahajan',
        '2002-01-01',
        '90897645312',
        'iib2019001@iiita.ac.in',
        'BTECH',
        2019,
        'M',
        8.80,
        'harsh@123'
    ),
    (
        'IIB2019002',
        'Pradhuman Singh',
        '2001-05-18',
        '1234567890',
        'iib2019002@iiita.ac.in',
        'BTECH',
        2019,
        'M',
        8.75,
        'prady@123'
    ),
    (
        'IIB2019003',
        'Vasu Gupta',
        '2001-08-01',
        '8858079808',
        'iib2019003@iiita.ac.in',
        'BTECH',
        2019,
        'M',
        8.43,
        'vasu@123'
    ),
    (
        'IIB2019004',
        'Saloni Singla',
        '2001-01-01',
        '7087356700',
        'iib2019004@iiita.ac.in',
        'BTECH',
        2019,
        'F',
        8.80,
        'saloni@123'
    ),
    (
        'IIB2019005',
        'Sandeep Sahu',
        '2000-08-09',
        '9808400338',
        'iib2019005@iiita.ac.in',
        'BTECH',
        2019,
        'M',
        8.74,
        'sandy@123'
    ),
    (
        'IIB2019006',
        'Amanjeet Kumar',
        '2000-04-04',
        '7903763980',
        'iib2019006@iiita.ac.in',
        'BTECH',
        2019,
        'M',
        8.40,
        'amanjeet@123'
    ),
    (
        'IIB2019007',
        'Aditya Raj',
        '2000-03-01',
        '0829209829',
        'iib2019007@iiita.ac.in',
        'BTECH',
        2019,
        'M',
        8.50,
        'aditya@123'
    ),
    (
        'IIB2019008',
        'Shyam Tayal',
        '2000-04-23',
        '8899674502',
        'iib2019008@iiita.ac.in',
        'BTECH',
        2019,
        'M',
        8.72,
        'shyam@123'
    ),
    (
        'IIB2019009',
        'Abhjeet Sonkar',
        '1998-09-01',
        '9876598765',
        'iib2019009@iiita.ac.in',
        'BTECH',
        2019,
        'M',
        8.99,
        'pogo@123'
    ),
    (
        'IIB2019010',
        'Avneesh Kumar',
        '2001-02-09',
        '8957163502',
        'iib2019010@iiita.ac.in',
        'BTECH',
        2019,
        'M',
        8.90,
        'password'
    ),
    (
        'IIB2019011',
        'Shubhang Singh',
        '2001-03-03',
        '9876543210',
        'iib2019011@iiita.ac.in',
        'BTECH',
        2019,
        'M',
        9.90,
        'shubhang@123'
    ),
    (
        'IIB2019016',
        'Ashish Tyagi',
        '2001-12-01',
        '9876543210',
        'iib2019016@iiita.ac.in',
        'BTECH',
        2019,
        'M',
        10.00,
        'ashish@123'
    );