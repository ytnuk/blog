--
-- PostgreSQL database dump
--

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: blog_category; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE blog_category (
    id integer NOT NULL,
    menu_id integer NOT NULL
);


--
-- Name: blog_category_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE blog_category_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: blog_category_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE blog_category_id_seq OWNED BY blog_category.id;


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY blog_category ALTER COLUMN id SET DEFAULT nextval('blog_category_id_seq'::regclass);


--
-- Name: blog_category_id; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY blog_category
    ADD CONSTRAINT blog_category_id PRIMARY KEY (id);


--
-- Name: blog_category_menu_id; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY blog_category
    ADD CONSTRAINT blog_category_menu_id UNIQUE (menu_id);


--
-- Name: blog_category_menu_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY blog_category
    ADD CONSTRAINT blog_category_menu_id_fkey FOREIGN KEY (menu_id) REFERENCES menu(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- PostgreSQL database dump complete
--

