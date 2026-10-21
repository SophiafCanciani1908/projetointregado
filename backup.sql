--
-- PostgreSQL database dump
--

\restrict 45Jvyt1GxGmPhiFaMGL8HC4Xn5hUgGWV4fM4zcU74B9IL8vQ0FgidFQo9anj3am

-- Dumped from database version 18.6 (Ubuntu 18.6-0ubuntu0.26.04.1)
-- Dumped by pg_dump version 18.6 (Ubuntu 18.6-0ubuntu0.26.04.1)

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET transaction_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- Name: agendamentos; Type: TABLE; Schema: public; Owner: academia
--

CREATE TABLE public.agendamentos (
    id integer NOT NULL,
    nome_aluna character varying(100) NOT NULL,
    personal character varying(100) NOT NULL,
    data_agendamento date NOT NULL,
    criado_em timestamp without time zone DEFAULT CURRENT_TIMESTAMP
);


ALTER TABLE public.agendamentos OWNER TO academia;

--
-- Name: agendamentos_id_seq; Type: SEQUENCE; Schema: public; Owner: academia
--

CREATE SEQUENCE public.agendamentos_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.agendamentos_id_seq OWNER TO academia;

--
-- Name: agendamentos_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: academia
--

ALTER SEQUENCE public.agendamentos_id_seq OWNED BY public.agendamentos.id;


--
-- Name: alunos; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.alunos (
    id integer NOT NULL,
    nome character varying(100) NOT NULL,
    cpf character varying(20),
    email character varying(100),
    telefone character varying(20),
    endereco character varying(200),
    turma character varying(100),
    data_nasc date,
    ativo character varying(10)
);


ALTER TABLE public.alunos OWNER TO postgres;

--
-- Name: alunos_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.alunos_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.alunos_id_seq OWNER TO postgres;

--
-- Name: alunos_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.alunos_id_seq OWNED BY public.alunos.id;


--
-- Name: usuarios; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.usuarios (
    id integer NOT NULL,
    email character varying(100) NOT NULL,
    senha character varying(100) NOT NULL
);


ALTER TABLE public.usuarios OWNER TO postgres;

--
-- Name: usuarios_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.usuarios_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.usuarios_id_seq OWNER TO postgres;

--
-- Name: usuarios_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.usuarios_id_seq OWNED BY public.usuarios.id;


--
-- Name: agendamentos id; Type: DEFAULT; Schema: public; Owner: academia
--

ALTER TABLE ONLY public.agendamentos ALTER COLUMN id SET DEFAULT nextval('public.agendamentos_id_seq'::regclass);


--
-- Name: alunos id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.alunos ALTER COLUMN id SET DEFAULT nextval('public.alunos_id_seq'::regclass);


--
-- Name: usuarios id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.usuarios ALTER COLUMN id SET DEFAULT nextval('public.usuarios_id_seq'::regclass);


--
-- Data for Name: agendamentos; Type: TABLE DATA; Schema: public; Owner: academia
--

COPY public.agendamentos (id, nome_aluna, personal, data_agendamento, criado_em) FROM stdin;
9	vitoria	Giovanna	2026-02-12	2026-10-21 14:23:03.49103
\.


--
-- Data for Name: alunos; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.alunos (id, nome, cpf, email, telefone, endereco, turma, data_nasc, ativo) FROM stdin;
16	cancianifsophia@gmail.com	\N	cancianifsophia@gmail.com	\N	\N	Amanda	2026-10-03	07:00
18	luisa@gmail.com	\N	luisa@gmail.com	\N	\N	Amanda	2026-08-10	07:00
19	luisa@gmail.com	\N	luisa@gmail.com	\N	\N	Amanda	2026-10-08	07:00
20	luisa ferreira canciani	\N	luisa@gmail.com	\N	\N	Geral	2026-10-07	1908
21	luisa ferreira canciani	\N	luisa@gmail.com	\N	\N	Geral	2026-10-07	1908
22	cancianifsophia@gmail.com	\N	cancianifsophia@gmail.com	\N	\N	Sophia	2026-10-02	09:00
23	luisa ferreira canciani	\N	luisa@gmail.com	\N	\N	Geral	2026-10-07	1908
24	luisa	\N	luisa@gmail	\N	\N	Geral	2026-10-21	1908
25	luisa	\N	luisa@gmail.com	\N	\N	Geral	2026-10-21	1908
26	juizo tiago	\N	juizotiago@gmail.com	\N	\N	Geral	2026-10-21	1908
27	vitoria	\N	vitoria@gmail.com	\N	\N	Geral	2026-10-21	1908
\.


--
-- Data for Name: usuarios; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.usuarios (id, email, senha) FROM stdin;
1	cancianifsophia@gmail.com	1908
\.


--
-- Name: agendamentos_id_seq; Type: SEQUENCE SET; Schema: public; Owner: academia
--

SELECT pg_catalog.setval('public.agendamentos_id_seq', 9, true);


--
-- Name: alunos_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.alunos_id_seq', 27, true);


--
-- Name: usuarios_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.usuarios_id_seq', 2, true);


--
-- Name: agendamentos agendamentos_pkey; Type: CONSTRAINT; Schema: public; Owner: academia
--

ALTER TABLE ONLY public.agendamentos
    ADD CONSTRAINT agendamentos_pkey PRIMARY KEY (id);


--
-- Name: alunos alunos_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.alunos
    ADD CONSTRAINT alunos_pkey PRIMARY KEY (id);


--
-- Name: usuarios usuarios_email_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.usuarios
    ADD CONSTRAINT usuarios_email_key UNIQUE (email);


--
-- Name: usuarios usuarios_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.usuarios
    ADD CONSTRAINT usuarios_pkey PRIMARY KEY (id);


--
-- PostgreSQL database dump complete
--

\unrestrict 45Jvyt1GxGmPhiFaMGL8HC4Xn5hUgGWV4fM4zcU74B9IL8vQ0FgidFQo9anj3am

