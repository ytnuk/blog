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
-- Name: blog_category_description; Type: TABLE; Schema: public; Owner: -; Tablespace: 
--

CREATE TABLE blog_category_description (
    id integer NOT NULL,
    category_id integer NOT NULL,
    value integer NOT NULL
);


--
-- Name: blog_category_description_id_seq; Type: SEQUENCE; Schema: public; Owner: -
--

CREATE SEQUENCE blog_category_description_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: blog_category_description_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: -
--

ALTER SEQUENCE blog_category_description_id_seq OWNED BY blog_category_description.id;


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: -
--

ALTER TABLE ONLY blog_category_description ALTER COLUMN id SET DEFAULT nextval('blog_category_description_id_seq'::regclass);


--
-- Name: blog_category_description_category_id; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY blog_category_description
    ADD CONSTRAINT blog_category_description_category_id UNIQUE (category_id);


--
-- Name: blog_category_description_id; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY blog_category_description
    ADD CONSTRAINT blog_category_description_id PRIMARY KEY (id);


--
-- Name: blog_category_description_value; Type: CONSTRAINT; Schema: public; Owner: -; Tablespace: 
--

ALTER TABLE ONLY blog_category_description
    ADD CONSTRAINT blog_category_description_value UNIQUE (value);


--
-- Name: blog_category_description_category_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY blog_category_description
    ADD CONSTRAINT blog_category_description_category_id_fkey FOREIGN KEY (category_id) REFERENCES blog_category(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- Name: blog_category_description_value_fkey; Type: FK CONSTRAINT; Schema: public; Owner: -
--

ALTER TABLE ONLY blog_category_description
    ADD CONSTRAINT blog_category_description_value_fkey FOREIGN KEY (value) REFERENCES translation(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- PostgreSQL database dump complete
--

