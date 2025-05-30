--
-- PostgreSQL database dump
--

-- Dumped from database version 13.2 (Debian 13.2-1.pgdg100+1)
-- Dumped by pg_dump version 13.2 (Debian 13.2-1.pgdg100+1)

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
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
-- Name: users; Type: TABLE; Schema: public; Owner: getting-started-user
--

CREATE TABLE public.users (
    id integer NOT NULL,
    name character varying(50) NOT NULL,
    email character varying(50) NOT NULL,
    password character varying(255) NOT NULL
);


ALTER TABLE public.users OWNER TO "getting-started-user";

--
-- Name: users_id_seq; Type: SEQUENCE; Schema: public; Owner: getting-started-user
--

CREATE SEQUENCE public.users_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.users_id_seq OWNER TO "getting-started-user";

--
-- Name: users_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: getting-started-user
--

ALTER SEQUENCE public.users_id_seq OWNED BY public.users.id;


--
-- Name: users id; Type: DEFAULT; Schema: public; Owner: getting-started-user
--

ALTER TABLE ONLY public.users ALTER COLUMN id SET DEFAULT nextval('public.users_id_seq'::regclass);


--
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: getting-started-user
--

COPY public.users (id, name, email, password) FROM stdin;
1	Vadym	vadikstarchak04@gmail.com	827ccb0eea8a706c4c34a16891f84e7b
2	Vadym1	vadikstarchak05@gmail.com	827ccb0eea8a706c4c34a16891f84e7b
\.


--
-- Name: users_id_seq; Type: SEQUENCE SET; Schema: public; Owner: getting-started-user
--

SELECT pg_catalog.setval('public.users_id_seq', 2, true);


--
-- Name: users users_email; Type: CONSTRAINT; Schema: public; Owner: getting-started-user
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_email UNIQUE (email);


--
-- Name: users users_pkey; Type: CONSTRAINT; Schema: public; Owner: getting-started-user
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);


--
-- Name: users users_username; Type: CONSTRAINT; Schema: public; Owner: getting-started-user
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_username UNIQUE (name);


--
-- PostgreSQL database dump complete
--

